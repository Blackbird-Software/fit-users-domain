<?php
declare(strict_types=1);

namespace App\User\Infrastructure\Repository;

use App\User\Domain\ValueObject\Email;
use App\User\Domain\ValueObject\UserId;
use App\User\Infrastructure\View\UserView;
use App\User\Infrastructure\View\UserViews;
use Predis\Client;

final class UserViewsRedisRepository implements UserViews
{
    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * Basically, find method can return nullable object, however, to not to deal with if statements,
     * in that case I'm going to return NullObject implementation instead.
     */
    public function find(UserId $id): UserView
    {
        // TODO: Implement find() method.
    }

    public function get(UserId $id): UserView
    {
        // TODO: Implement get() method.
    }

    public function getByEmail(Email $email): UserView
    {
        // TODO: Implement getByEmail() method.
    }

    public function contains(UserId $id): bool
    {
        // TODO: Implement contains() method.
    }

    public function findAll(): array
    {
        // TODO: Implement findAll() method.
    }
}