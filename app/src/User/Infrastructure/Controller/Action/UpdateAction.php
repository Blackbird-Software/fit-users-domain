<?php
declare(strict_types=1);

namespace App\User\Infrastructure\Controller\Action;

use App\Shared\Application\CommandBusInterface;
use App\Shared\Infrastructure\Controller\Action\AbstractAction;
use App\Shared\Infrastructure\Generator\IdGeneratorInterface;
use App\User\Application\Command\UpdateUserCommand;
use App\User\Application\CommandHandler\UpdateCommandHandler;
use App\User\Domain\Repository\Users;
use App\User\Domain\ValueObject\UserId;
use App\User\Infrastructure\DTO\UpdateUserRequest;
use App\User\Infrastructure\ReadModel\Exception\UserViewNotFoundException;
use App\User\Infrastructure\ReadModel\Repository\UserViews;
use JMS\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Response;

final class UpdateAction extends AbstractAction
{
    private CommandBusInterface $commandBus;

    private Users $users;

    private UserViews $readRepository;

    private IdGeneratorInterface $generator;

    public function __construct(
        SerializerInterface $serializer,
        CommandBusInterface $commandBus,
        Users $users,
        UserViews $readRepository,
        IdGeneratorInterface $generator
    ) {
        $this->commandBus = $commandBus;
        $this->users = $users;
        $this->readRepository = $readRepository;
        $this->generator = $generator;
        parent::__construct($serializer);
    }

    /**
     * @throws UserViewNotFoundException
     */
    public function __invoke(UpdateUserRequest $request): Response
    {
        $id = $this->generator->generateFromString($request->id());
        $userId = new UserId($id);

        $this->commandBus->subscribe(UpdateUserCommand::class, new UpdateCommandHandler($this->users));
        $this->commandBus->dispatch(new UpdateUserCommand($request, $userId));

        return $this->createApiResponse($this->readRepository->get($userId));
    }
}