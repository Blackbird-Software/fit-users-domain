<?php

declare(strict_types=1);

namespace App\User\Application\CommandHandler;

use App\Common\Application\CommandHandlerInterface;
use App\User\Application\Command\RegisterUserCommand;
use App\User\Domain\Repository\Users;

final class RegisterUserCommandHandler implements CommandHandlerInterface
{
    private Users $users;

    public function __construct(Users $users)
    {
        $this->users = $users;
    }

    public function handle(RegisterUserCommand $command): void
    {
        $this->users->add($command->user());
    }
}