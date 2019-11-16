<?php
declare(strict_types=1);

namespace App\User\Infrastructure\Repository;

use App\User\Domain\Repository\Users;
use App\User\Domain\Exception\UserNotFoundException;
use App\User\Domain\Model\UserInterface;
use App\User\Domain\ValueObject\Email;
use App\Shared\Domain\ValueObject\IdInterface;
use App\User\Infrastructure\Service\Factory\UsersFactoryInterface;
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

    public function contains(IdInterface $id): bool
    {
        return (bool) $this->find($id);
    }

    /**
     * Basically, find method can return nullable object, however, to not to deal with if statements,
     * in that case I'm going to return NullObject implementation instead.
     */
    public function find(IdInterface $id): UserInterface
    {
        $params = $this->client->hgetall($id->value());

        return $this->factory->fromArray($params);
    }

    /** @throws UserNotFoundException */
    public function get(IdInterface $id): UserInterface
    {
       if ($user = $this->find($id)) {
          return $user;
       }

       throw new UserNotFoundException();
    }

    public function getByEmail(Email $email): UserInterface
    {
        // TODO: Implement getByEmail() method.
    }

    public function remove(UserInterface $user): void
    {
       $this->client->del($user->id()->value());
    }

}