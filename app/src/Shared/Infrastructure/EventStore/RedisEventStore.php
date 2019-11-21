<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\EventStore;

use App\Admin\Domain\Event\EventTypeLocator;
use App\Shared\Domain\Event\AggregateChanged;
use Predis\Client;

final class RedisEventStore implements EventStore
{
    private const MAIN_KEY = 'event_streams';

    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function save(AggregateChanged $event): void
    {
        $idx = $this->client->scard(self::MAIN_KEY);
        $tmpKey = sprintf('event_%d', $idx);

        $this->client->hmset($tmpKey, [
            'aggregate_id' => $event->aggregateId(),
            'event' => json_encode($event),
            'event_type' => EventTypeLocator::getKeyByEvent($event),
            'version' => $event->version(),
        ]);

        $this->client->sadd(self::MAIN_KEY, [$tmpKey]);
    }

    public function findAllEvents(): array
    {
        return $this->events();
    }

    public function findEvents(string $aggregateId): array
    {
        return $this->events($aggregateId);
    }

    private function events(?string $aggregateId = null): array
    {
        $events = [];
        $eventReferences = $this->client->smembers(self::MAIN_KEY);

        foreach ($eventReferences as $eventReference) {
            $event = $this->client->hgetall($eventReference);

            if($aggregateId) {
                if ($event['aggregate_id'] === $aggregateId) {
                    $events[] = $event;
                }
            } else {
                $events[] = $event;
            }
        }

        return $events;
    }

}