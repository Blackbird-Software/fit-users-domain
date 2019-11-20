<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\EventStore;

use App\Shared\Domain\Event\AggregateChanged;

interface EventStore
{
    public function save(AggregateChanged $event);

    public function findEvents($aggregateId);
}