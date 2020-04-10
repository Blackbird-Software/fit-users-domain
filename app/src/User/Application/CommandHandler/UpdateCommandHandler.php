<?php

declare(strict_types=1);

namespace App\User\Application\CommandHandler;

use App\Common\Application\CommandHandlerInterface;
use App\User\Application\Command\UpdateUserCommand;
use App\User\Domain\Repository\Users;

final class UpdateCommandHandler implements CommandHandlerInterface
{
    private Users $users;

    public function __construct(Users $users)
    {
        $this->users = $users;
    }

    public function handle(UpdateUserCommand $command): void
    {
        $user = $this->users->get($command->id());
        $user->update(
            $command->firstname(),
            $command->lastname(),
            $command->locale(),
            $command->updatedAt()
        );
        $this->users->update($user);
    }
}