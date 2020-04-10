<?php

declare(strict_types=1);

namespace App\Common\Domain\Repository;

use App\Admin\Domain\Event\EventTypeLocator;
use App\Common\Domain\Model\AggregateRoot;
use App\Common\Infrastructure\EventStore\EventStore;

abstract class AggregateRootRepository implements AggregateRootRepositoryInterface
{
    private EventStore $eventStore;

    public function __construct(EventStore $eventStore)
    {
        $this->eventStore = $eventStore;
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
    public function aggregateRoots(): array
    {
        $aggregateRoots = [];
        $events = $this->eventStore->findAllEvents();

        foreach ($events as $event) {
            $aggregateId = $event['aggregate_id'];
            $aggregateRoots[$aggregateId] = $this->aggregateRoot($aggregateId);
        }

        return $aggregateRoots;
    }

    /**
     * @throws \ReflectionException
     */
    public function aggregateRoot(string $aggregateId)
    {
        $events = $this->eventStore->findEvents($aggregateId);
        $reflection = new \ReflectionClass($this->aggregateRootClass());

        /** @var AggregateRoot $object */
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
            $event = $event->withVersion((int)$version);
            $object->apply($event);
        }

        return $object;
    }
}