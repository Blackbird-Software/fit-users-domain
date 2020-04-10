<?php

declare(strict_types=1);

namespace App\Common\Infrastructure\EventStore;

use App\Common\Domain\Event\AggregateChanged;

interface EventStore
{
    public function save(AggregateChanged $event): void;

    public function findAllEvents(): array;

    public function findEvents(string $aggregateId): array;
}