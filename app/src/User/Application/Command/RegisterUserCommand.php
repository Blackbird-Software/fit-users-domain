<?php

declare(strict_types=1);

namespace App\User\Application\Command;

use App\Common\Application\CommandInterface;
use App\User\Domain\Model\UserInterface;

final class RegisterUserCommand implements CommandInterface
{
    private UserInterface $user;

    public function __construct(UserInterface $user)
    {
        $this->user = $user;
    }

    public static function create(UserInterface $user): self
    {
        return new self($user);
    }

    public function user(): UserInterface
    {
        return $this->user;
    }
}