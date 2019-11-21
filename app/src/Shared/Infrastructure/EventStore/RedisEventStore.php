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
        $idx  = $this->client->scard(self::MAIN_KEY);
        $tmpKey = sprintf('event_%d', $idx);

        $this->client->hmset($tmpKey, [
            'aggregate_id' => $event->aggregateId(),
            'event' => json_encode($event),
            'event_type' => EventTypeLocator::getKeyByEvent($event),
            'version' => $event->version(),
        ]);

        $this->client->sadd(self::MAIN_KEY, [$tmpKey]);
    }

    public function findEvents(string $aggregateId): array
    {
        $events = [];
        $eventReferences = $this->client->smembers(self::MAIN_KEY);

        foreach($eventReferences as $eventReference) {
            $event = $this->client->hgetall($eventReference);

            if($event['aggregate_id'] === $aggregateId) {
                $events[] = $event;
            }
        }

        return array_reverse($events);
    }

}