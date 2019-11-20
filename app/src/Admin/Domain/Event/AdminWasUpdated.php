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

    public function __construct(UserId $id, UpdatedAt $updatedAt, Locale $locale)
    {
        $this->id = $id;
        $this->updatedAt = $updatedAt;
        $this->locale = $locale;
    }

    // @TODO NullPointerException?
    public function jsonSerialize(): array
    {
        return [
            $this->id->value(),
            $this->updatedAt->value()->format(\DATE_ATOM),
            $this->locale->value()
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