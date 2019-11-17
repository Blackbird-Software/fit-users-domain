<?php

declare(strict_types=1);

namespace App\User\Application\CommandHandler;

use App\Shared\Application\CommandHandlerInterface;
use App\User\Application\Command\DeleteUserCommand;
use App\User\Domain\Repository\Users;

final class DeleteUserCommandHandler implements CommandHandlerInterface
{
    private Users $users;

    public function __construct(Users $users)
    {
        $this->users = $users;
    }

    public function handle(DeleteUserCommand $command): void
    {
        $user = $this->users->get($command->id());
        $this->users->remove($user);
    }
}