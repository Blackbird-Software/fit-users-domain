<?php

namespace App\User\Domain;

use App\Shared\Domain\Event\DomainEvent;
use App\User\Domain\Model\UserInterface;

final class UserWasRegistered implements DomainEvent
{
    private UserInterface $user;

    public function __construct(UserInterface $user)
    {
        $this->user = $user;
    }

    public function user(): UserInterface
    {
        return $this->user;
    }
}