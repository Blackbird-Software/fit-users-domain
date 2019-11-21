<?php

namespace App\Admin\Domain\Event;

use App\Shared\Domain\Event\AggregateChanged;
use App\User\Domain\ValueObject\Locale;
use App\User\Domain\ValueObject\UpdatedAt;
use App\User\Domain\ValueObject\UserId;

final class AdminWasUpdated extends AggregateChanged
{
    private UserId $id;

    private UpdatedAt $updatedAt;

    private Locale $locale;

    public function __construct(string $aggregateId, array $payload)
    {
        $this->id = UserId::fromString($aggregateId);
        $this->updatedAt = new UpdatedAt(\DateTimeImmutable::createFromFormat(\DATE_ATOM, $payload['updatedAt']));
        $this->locale = new Locale($payload['locale']);
    }

    // @TODO NullPointerException?
    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id->value(),
            'updatedAt' => $this->updatedAt->value()->format(\DATE_ATOM),
            'locale' => $this->locale->value()
        ];
    }

    public function aggregateId(): string
    {
        return (string) $this->id;
    }

    public function id(): UserId
    {
        return $this->id;
    }

    public function updatedAt(): UpdatedAt
    {
        return $this->updatedAt;
    }

    public function locale(): Locale
    {
        return $this->locale;
    }
}