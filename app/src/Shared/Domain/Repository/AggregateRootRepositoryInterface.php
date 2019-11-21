<?php

declare(strict_types=1);

namespace App\Shared\Domain\Repository;

use App\Shared\Domain\Model\AggregateRoot;

interface AggregateRootRepositoryInterface
{
    public function aggregateRootClass(): string;

    public function saveAggregateRoot(AggregateRoot $aggregateRoot): void;

    public function aggregateRoots(): array;

    public function aggregateRoot(string $aggregateId);
}