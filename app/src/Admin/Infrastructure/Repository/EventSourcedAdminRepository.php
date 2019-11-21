<?php
declare(strict_types=1);

namespace App\Admin\Infrastructure\Repository;

use App\Admin\Domain\Model\Admin;
use App\Admin\Domain\Model\AdminInterface;
use App\Admin\Domain\Repository\Admins;
use App\Shared\Domain\Repository\AggregateRootRepository;
use App\User\Domain\ValueObject\Email;
use App\User\Domain\ValueObject\UserId;

final class EventSourcedAdminRepository extends AggregateRootRepository implements Admins
{
    public function aggregateRootClass(): string
    {
        return Admin::class;
    }

    // @TODO what to do with mismatch types?
    public function add(AdminInterface $admin): void
    {
        $this->saveAggregateRoot($admin);
    }

    public function update(AdminInterface $admin): void
    {
        $this->saveAggregateRoot($admin);
    }

    // @TODO types?
    public function find(UserId $id): AdminInterface
    {
         return $this->aggregateRoot((string) $id);
    }

    public function get(UserId $id): AdminInterface
    {
        // TODO: Implement get() method.
    }

    public function getByEmail(Email $email): AdminInterface
    {
        // TODO: Implement getByEmail() method.
    }

    public function remove(AdminInterface $admin): void
    {
        // TODO: Implement remove() method.
    }

    public function findAll(): array
    {
        return $this->aggregateRoots();
    }
}