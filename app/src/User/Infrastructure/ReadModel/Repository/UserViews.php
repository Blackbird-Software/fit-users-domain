<?php

declare(strict_types=1);

namespace App\User\Infrastructure\ReadModel\Repository;

use App\Shared\Infrastructure\Pagination\PaginatedCollectionInterface;
use App\User\Domain\ValueObject\Email;
use App\User\Domain\ValueObject\UserId;
use App\User\Infrastructure\ReadModel\Exception\UserViewNotFoundException;
use App\User\Infrastructure\ReadModel\View\UserView;

interface UserViews
{
    public function contains(UserId $id): bool;

    // possibly could be null
    public function find(UserId $id): UserView;

    /**
     * @throws UserViewNotFoundException
     */
    public function get(UserId $id): UserView;

    /**
     * @throws UserViewNotFoundException
     */
    public function getByEmail(Email $email): UserView;

    // @TODO add criteria
    public function findAll(): array;

    public function getPaginatedCollection(array $params): PaginatedCollectionInterface;
}