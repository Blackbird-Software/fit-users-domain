<?php
declare(strict_types=1);

namespace App\Admin\Domain\Repository;

use App\Admin\Domain\Model\AdminInterface;
use App\User\Domain\ValueObject\Email;
use App\User\Domain\ValueObject\UserId;

interface Admins
{
    public function add(AdminInterface $admin): void;

    public function update(AdminInterface $admin): void;

    // possibly could be null
    public function find(UserId $id): AdminInterface;

    public function get(UserId $id): AdminInterface;

    public function getByEmail(Email $email): AdminInterface;

    public function remove(AdminInterface $admin): void;
}