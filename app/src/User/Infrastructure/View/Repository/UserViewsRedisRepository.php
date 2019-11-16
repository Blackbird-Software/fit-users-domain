<?php
declare(strict_types=1);

namespace App\User\Infrastructure\View\Repository;

use App\User\Domain\ValueObject\Email;
use App\User\Domain\ValueObject\UserId;
use App\User\Infrastructure\View\Exception\UserViewNotFoundException;
use App\User\Infrastructure\View\Factory\UserViewsFactoryInterface;
use App\User\Infrastructure\View\Model\UserView;
use Predis\Client;

final class UserViewsRedisRepository implements UserViews
{
    private Client $client;

    private UserViewsFactoryInterface $factory;

    public function __construct(Client $client, UserViewsFactoryInterface $factory)
    {
        $this->client = $client;
        $this->factory = $factory;
    }

    public function contains(UserId $id): bool
    {
        return (bool) $this->find($id);
    }

    /**
     * Basically, find method can return nullable object, however, to not to deal with if statements,
     * in that case I'm going to return NullObject implementation instead.
     */
    // @TODO reverse methods/
    // @TODO implement NullUser?
    public function find(UserId $id): UserView
    {
        $params = $this->client->hgetall($id->value());

        return $this->factory->fromArray($params);
    }

    /**
     * @throws UserViewNotFoundException
     */
    public function get(UserId $id): UserView
    {
       if ($user = $this->find($id)) {
          return $user;
       }

       throw new UserViewNotFoundException();
    }

    public function getByEmail(Email $email): UserView
    {
        // TODO: Implement getByEmail() method.
    }

    public function findAll(): array
    {
        $users = [];
        $keys = $this->client->keys('*');

        foreach ($keys as $key) {
           $user = $this->client->hgetall($key);
           $users[] = $this->factory->fromArray($user);
        }

        return $users;
    }
}