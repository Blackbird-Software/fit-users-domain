<?php

declare(strict_types=1);

namespace App\Shared\Domain\Repository;

use App\Admin\Domain\Event\EventTypeLocator;
use App\Admin\Domain\Model\Admin;
use App\Shared\Domain\Model\AggregateRoot;
use App\Shared\Infrastructure\EventStore\EventStore;

abstract class AggregateRootRepository
{
    private EventStore $eventStore;

    public function __construct(EventStore $eventStore)
    {
        $this->eventStore = $eventStore;
    }

    public function class(): string
    {
        return Admin::class;
    }

    public function saveAggregateRoot(AggregateRoot $aggregateRoot): void
    {
        $events = $aggregateRoot->popRecordedEvents();

        foreach ($events as $event) {
            $this->eventStore->save($event);
        }
    }

    /**
     * @throws \ReflectionException
     */
    public function getAggregateRoot(string $aggregateId)
    {
        $events = $this->eventStore->findEvents($aggregateId);
        $reflection = new \ReflectionClass($this->class());
        $object = $reflection->newInstanceWithoutConstructor();

        foreach ($events as $eventMessage) {
            [
                'event' => $event,
                'event_type' => $eventType,
                'version' => $version
            ] = $eventMessage;

            $eventClass = EventTypeLocator::getClassNameByKey($eventType);
            $eventReflection = new \ReflectionClass($eventClass);
            $payload = json_decode($event, true);

            $event = $eventReflection->newInstance(
                $aggregateId,
                $payload
            );
            $event = $event->withVersion((int) $version);
            $object->apply($event);
        }

        return $object;
    }
}