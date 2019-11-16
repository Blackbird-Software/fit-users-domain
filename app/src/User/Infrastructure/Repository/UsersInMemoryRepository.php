<?php
declare(strict_types=1);

namespace App\User\Infrastructure\Repository;

use App\User\Domain\Repository\Users;
use App\User\Domain\Exception\UserNotFoundException;
use App\User\Domain\Model\UserInterface;
use App\User\Domain\ValueObject\Email;
use App\Shared\Domain\ValueObject\IdInterface;

final class UsersInMemoryRepository implements Users
{
    private array $users = [];

    public function add(UserInterface $user): void
    {
        $this->users[] = $user;
    }

    public function contains(IdInterface $id): bool
    {
        return (bool) $this->find($id);
    }

    public function find(IdInterface $id): UserInterface
    {
        /** @var UserInterface $user */
        foreach ($this->users as $user) {
            if($user->id()->value() === $id->value()) {
                return $user;
            }
        }

        return null;
    }

    /** @throws UserNotFoundException */
    public function get(IdInterface $id): UserInterface
    {
        if($user = $this->find($id)) {
            return $user;
        }

        throw new UserNotFoundException();
    }

    /** @throws UserNotFoundException */
    public function getByEmail(Email $email): UserInterface
    {
        /** @var UserInterface $user */
        foreach ($this->users as $user) {
            if($user->email()->value() === $email->value()) {
                return $user;
            }
        }

        throw new UserNotFoundException();
    }

    /** @throws UserNotFoundException */
    public function remove(UserInterface $user): void
    {
        $user = $this->get($user->id());

        /** @var UserInterface $tmpUser */
       foreach ($this->users as $key => $tmpUser) {
           if($tmpUser->id()->value() === $user->id()->value()) {
               unset($this->users[$key]);
           }
       }
    }
}