<?php
declare(strict_types=1);

namespace App\User\Infrastructure\Controller\Action;

use App\Common\Application\CommandBusInterface;
use App\Common\Infrastructure\Controller\Action\AbstractAction;
use App\User\Application\Command\DeleteUserCommand;
use App\User\Application\CommandHandler\DeleteUserCommandHandler;
use App\Common\Infrastructure\Generator\IdGeneratorInterface;
use App\User\Domain\Repository\Users;
use App\User\Domain\ValueObject\UserId;
use JMS\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class RemoveAction extends AbstractAction
{
    private IdGeneratorInterface $generator;

    private CommandBusInterface $commandBus;

    private Users $users;

    public function __construct(SerializerInterface $serializer, IdGeneratorInterface $generator, Users $users, CommandBusInterface $commandBus)
    {
        $this->generator = $generator;
        $this->commandBus = $commandBus;
        $this->users = $users;
        parent::__construct($serializer);
    }

    public function __invoke(Request $request): Response
    {
        $id = $this->generator->generateFromString($request->attributes->get('id'));

        $this->commandBus->subscribe(DeleteUserCommand::class, new DeleteUserCommandHandler($this->users));
        $this->commandBus->dispatch(new DeleteUserCommand(new UserId($id)));

        return $this->createApiResponse(null, Response::HTTP_NO_CONTENT);
    }
}