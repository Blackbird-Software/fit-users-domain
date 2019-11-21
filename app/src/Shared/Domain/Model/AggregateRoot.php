<?php

declare(strict_types=1);

namespace App\Shared\Domain\Model;

use App\Shared\Domain\Event\AggregateChanged;

abstract class AggregateRoot
{
    protected array $recordedEvents;

    protected int $version = 0;

    // @TODO version is not saved properly
    protected function record(AggregateChanged $event) : void
    {
        $this->version += 1;
        $this->recordedEvents[] = $event->withVersion($this->version);
        $this->apply($event);
    }

    public function popRecordedEvents(): array
    {
        $pendingEvents = $this->recordedEvents;
        $this->recordedEvents = [];

        return $pendingEvents;
    }

    // @TODO should not be public! IMPORTANT!!!
    abstract public function apply(AggregateChanged $event): void;

    abstract public function aggregateId(): string;
}