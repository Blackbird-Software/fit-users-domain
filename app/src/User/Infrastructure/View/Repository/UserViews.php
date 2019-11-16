<?php

declare(strict_types=1);

namespace App\User\Infrastructure\View\Repository;

use App\User\Domain\ValueObject\Email;
use App\User\Domain\ValueObject\UserId;
use App\User\Infrastructure\View\Exception\UserViewNotFoundException;
use App\User\Infrastructure\View\Model\UserView;

// @TODO move to repository
interface UserViews
{
    public function contains(UserId $id): bool;

    // possibly could be null
    public function find(UserId $id): UserView;

    /**
     * @throws UserViewNotFoundException
     */
    public function get(UserId $id): UserView;

    public function getByEmail(Email $email): UserView;

    public function findAll(): array;
}