<?php

declare(strict_types=1);

namespace App\Shared\Domain\Repository;

use App\Shared\Domain\Model\AggregateRoot;
use App\Shared\Infrastructure\EventStore\EventStore;

abstract class AggregateRootRepository
{
    private EventStore $eventStore;

    public function __construct(EventStore $eventStore)
    {
        $this->eventStore = $eventStore;
    }

    public function saveAggregateRoot(AggregateRoot $aggregateRoot): void
    {
        $events = $aggregateRoot->popRecordedEvents();

        foreach($events as $event) {
            $this->eventStore->save($event);
        }
    }

    public function getAggregateRoot()
    {

    }
}