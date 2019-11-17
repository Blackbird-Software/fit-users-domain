<?php
declare(strict_types=1);

namespace App\User\Infrastructure\ReadModel\Repository;

use App\Shared\Infrastructure\Pagination\PaginatedCollectionInterface;
use App\User\Domain\ValueObject\Email;
use App\User\Domain\ValueObject\UserId;
use App\User\Infrastructure\Pagination\RedisPaginationFactory;
use App\User\Infrastructure\ReadModel\Exception\UserViewNotFoundException;
use App\User\Infrastructure\ReadModel\Factory\UserViewsFactoryInterface;
use App\User\Infrastructure\ReadModel\View\UserView;
use Predis\Client;

final class UserViewsRedisRepository implements UserViews
{
    private Client $client;

    private UserViewsFactoryInterface $factory;

    private RedisPaginationFactory $paginationFactory;

    public function __construct(Client $client, UserViewsFactoryInterface $factory, RedisPaginationFactory $paginationFactory)
    {
        $this->client = $client;
        $this->factory = $factory;
        $this->paginationFactory = $paginationFactory;
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

    /**
     * @throws UserViewNotFoundException
     */
    public function getByEmail(Email $email): UserView
    {
        $keys = $this->client->keys('*');

        foreach ($keys as $key) {
            $user = $this->client->hgetall($key);
            if($user['email'] === $email->value()) {
                return $this->factory->fromArray($user);
            }
        }

        throw new UserViewNotFoundException();
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

    public function getPaginatedCollection(array $params): PaginatedCollectionInterface
    {
        return $this->createPaginatedCollection($params, 'api_browse_users');
    }

    private function createPaginatedCollection(array $params, string $route): PaginatedCollectionInterface
    {
        return $this->paginationFactory->createCollection(
            $this->findAll(),
            $params,
            $route
        );
    }
}