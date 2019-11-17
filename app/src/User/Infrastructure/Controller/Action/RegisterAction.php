<?php
declare(strict_types=1);

namespace App\User\Infrastructure\Controller\Action;

use App\Shared\Application\CommandBusInterface;
use App\Shared\Infrastructure\Controller\Action\AbstractAction;
use App\User\Application\Command\RegisterUserCommand;
use App\User\Application\CommandHandler\RegisterUserCommandHandler;
use App\User\Domain\Repository\Users;
use App\User\Infrastructure\DTO\RegisterUserRequest;
use App\User\Infrastructure\Factory\UsersFactoryInterface;
use App\User\Infrastructure\ReadModel\Exception\UserViewNotFoundException;
use App\User\Infrastructure\ReadModel\Repository\UserViews;
use JMS\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RouterInterface;

final class RegisterAction extends AbstractAction
{
    private UsersFactoryInterface $factory;

    private CommandBusInterface $commandBus;

    private Users $users;

    private UserViews $readRepository;

    private RouterInterface $router;

    public function __construct(
        SerializerInterface $serializer,
        UsersFactoryInterface $factory,
        CommandBusInterface $commandBus,
        Users $users,
        UserViews $readRepository,
        RouterInterface $router
    ) {
        $this->factory = $factory;
        $this->commandBus = $commandBus;
        $this->users = $users;
        $this->readRepository = $readRepository;
        $this->router = $router;
        parent::__construct($serializer);
    }

    /**
     * @throws UserViewNotFoundException
     */
    public function __invoke(RegisterUserRequest $request): Response
    {
        $user = $this->factory->fromDTO($request);

        $this->commandBus->subscribe(RegisterUserCommand::class, new RegisterUserCommandHandler($this->users));
        $this->commandBus->dispatch(new RegisterUserCommand($user));

        $response = $this->createApiResponse($this->readRepository->get($user->id()), Response::HTTP_CREATED);
        $response->headers->set('Location', $this->router->generate('api_fetch_user', ['id' => $user->id()]));

        return $response;
    }
}