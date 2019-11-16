<?php
declare(strict_types=1);

namespace App\Application\Repository;

use App\Domain\Model\UserInterface;
use App\Domain\ValueObject\Email;
use App\Domain\ValueObject\IdInterface;

interface UsersRepositoryInterface
{
    public function add(UserInterface $user): void;

    public function contains(IdInterface $id): bool;

    // possibly could be null
    public function find(IdInterface $id): UserInterface;

    public function get(IdInterface $id): UserInterface;

    public function getByEmail(Email $email): UserInterface;

    public function remove(UserInterface $user): void;
}