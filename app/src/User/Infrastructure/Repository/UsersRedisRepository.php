<?php
declare(strict_types=1);

namespace App\User\Infrastructure\Repository;

use App\User\Domain\Repository\Users;
use App\User\Domain\Exception\UserNotFoundException;
use App\User\Domain\Model\UserInterface;
use App\User\Domain\ValueObject\UserId;
use App\User\Infrastructure\Factory\UsersFactoryInterface;
use Predis\Client;

final class UsersRedisRepository implements Users
{
    private Client $client;

    private UsersFactoryInterface $factory;

    public function __construct(Client $client, UsersFactoryInterface $factory)
    {
        $this->client = $client;
        $this->factory = $factory;
    }

    public function add(UserInterface $user): void
    {
        $this->client->hmset($user->id(), $this->factory->toArray($user));
    }

    /**
     * Basically, find method can return nullable object, however, to not to deal with if statements,
     * in that case I'm going to return NullObject implementation instead.
     */
    // @TODO reverse methods
    public function find(UserId $id): UserInterface
    {
        $params = $this->client->hgetall($id->value());

        return $this->factory->fromArray($params);
    }

    /** @throws UserNotFoundException */
    public function get(UserId $id): UserInterface
    {
       if ($user = $this->find($id)) {
          return $user;
       }

       throw new UserNotFoundException();
    }

    public function remove(UserInterface $user): void
    {
       $this->client->del($user->id()->value());
    }
}