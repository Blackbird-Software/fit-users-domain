<?php

declare(strict_types=1);

namespace App\User\Application\Message;

use App\Common\Application\Message\CollectedMessage;
use App\Common\Application\Message\MessageRecorder;
use Predis\Client;

final class RedisMessageRecorder implements MessageRecorder
{
    private const LIST_KEY = 'messages';

    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    // @TODO add toArray method
    public function add(CollectedMessage $message): void
    {
        $this->client->rpush(self::LIST_KEY, $message);
    }

    // @TODO add factory method
    public function lastMessage(): CollectedMessage
    {
       return $this->client->lrange(self::LIST_KEY, -1, -1);
    }

    public function messages(): array
    {
        return $this->client->lrange(self::LIST_KEY, 0, -1);
    }
}