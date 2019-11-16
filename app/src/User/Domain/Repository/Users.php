<?php
declare(strict_types=1);

namespace App\User\Domain\Repository;

use App\User\Domain\Model\UserInterface;
use App\User\Domain\ValueObject\Email;
use App\Shared\Domain\ValueObject\IdInterface;

interface Users
{
    public function add(UserInterface $user): void;

    public function contains(IdInterface $id): bool;

    // possibly could be null
    public function find(IdInterface $id): UserInterface;

    public function get(IdInterface $id): UserInterface;

    public function getByEmail(Email $email): UserInterface;

    public function remove(UserInterface $user): void;
}