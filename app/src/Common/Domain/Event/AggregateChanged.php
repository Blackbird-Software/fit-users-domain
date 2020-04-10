<?php

declare(strict_types=1);

namespace App\Common\Domain\Event;

abstract class AggregateChanged implements DomainEvent
{
    private int $version = 0;

    private string $aggregateId;

    private array $payload = [];

    public function __construct(string $aggregateId, array $payload, array $metadata = [])
    {
        $this->aggregateId = $aggregateId;
        $this->payload = $payload;
    }

    public static function occur(string $aggregateId, array $payload = []): self
    {
        return new static($aggregateId, $payload);
    }

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

    public function aggregateId(): string
    {
        return $this->aggregateId;
    }

    public function payload(): array
    {
        return $this->payload;
    }
}