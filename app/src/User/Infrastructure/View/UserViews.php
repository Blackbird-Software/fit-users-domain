<?php

declare(strict_types=1);

namespace App\User\Infrastructure\View;

use App\User\Domain\ValueObject\Email;
use App\User\Domain\ValueObject\UserId;

interface UserViews
{
    public function contains(UserId $id): bool;

    // possibly could be null
    public function find(UserId $id): UserView;

    public function get(UserId $id): UserView;

    public function getByEmail(Email $email): UserView;

    public function findAll(): array;
}