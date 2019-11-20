<?php

declare(strict_types=1);

namespace App\Shared\Domain\Event;

abstract class AggregateChanged implements DomainEvent
{
    private int $version = 0;

    public function withVersion(int $version): self
    {
        $self = clone $this;
        $self->updateVersion($version);

        return $self;
    }

    public function version(): int
    {
        return $this->version;
    }

    private function updateVersion(int $version): void
    {
        $this->version = $version;
    }

    abstract public function aggregateId(): string;
}