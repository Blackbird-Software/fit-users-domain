<?php

declare(strict_types=1);

namespace App\Shared\Application\Message;

use App\Shared\Domain\Event\DomainEvent;

final class CollectedMessage
{
    private DomainEvent $event;

    private bool $handled;

    public function __construct(DomainEvent $event, bool $handled)
    {
        $this->event = $event;
        $this->handled = $handled;
    }

    public function event(): DomainEvent
    {
        return $this->event;
    }

    public function isHandled(): bool
    {
        return $this->handled;
    }
}
