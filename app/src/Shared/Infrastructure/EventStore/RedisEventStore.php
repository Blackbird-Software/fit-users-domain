<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\EventStore;

use App\Shared\Domain\Event\AggregateChanged;
use Predis\Client;

final class RedisEventStore implements EventStore
{
    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function save(AggregateChanged $event)
    {
        $this->client->hmset('xyz', [
            'aggregate_id' => $event->aggregateId(),
            'event' => json_encode($event),
            'version' => $event->version()
        ]);
        $this->client->sadd('event_store', $this->client->hgetall('xyz'));
    }

    public function findEvents($aggregateId)
    {
        // TODO: Implement findEvents() method.
    }

}