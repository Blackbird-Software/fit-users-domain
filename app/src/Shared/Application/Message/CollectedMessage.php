<?php

declare(strict_types=1);

namespace App\Shared\Application\Message;

use App\Shared\Domain\Event\AggregateChanged;

final class CollectedMessage
{
    private AggregateChanged $event;

    private bool $handled;

    public function __construct(AggregateChanged $event, bool $handled)
    {
        $this->event = $event;
        $this->handled = $handled;
    }

    public function event(): AggregateChanged
    {
        return $this->event;
    }

    public function isHandled(): bool
    {
        return $this->handled;
    }
}
