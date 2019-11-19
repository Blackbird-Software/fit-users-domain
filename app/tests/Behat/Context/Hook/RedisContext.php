<?php

declare(strict_types=1);

namespace Tests\Behat\Context\Hook;

use Behat\Behat\Context\Context;
use Predis\Client;

final class RedisContext implements Context
{
    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /** @BeforeScenario */
    public function purgeDatabase(): void
    {
        $this->client->flushall();
    }
}
