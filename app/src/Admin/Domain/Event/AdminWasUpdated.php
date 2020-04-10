<?php

namespace App\Admin\Domain\Event;

use App\Common\Domain\Event\AggregateChanged;
use App\User\Domain\ValueObject\Locale;
use App\User\Domain\ValueObject\UpdatedAt;
use App\User\Domain\ValueObject\UserId;

final class AdminWasUpdated extends AggregateChanged
{
    public static function withData(UserId $id, UpdatedAt $updatedAt, Locale $locale): AdminWasUpdated
    {
        // updatedAt cannot be null?
        return self::occur(
            $id->value(),
            [
                'updatedAt' => $updatedAt->value()->format(\DATE_ATOM),
                'locale' => $locale->value()
            ]
        );
    }

    // @TODO NullPointerException?
    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id()->value(),
            'updatedAt' => $this->updatedAt()->value()->format(\DATE_ATOM),
            'locale' => $this->locale()->value()
        ];
    }

    public function id(): UserId
    {
        return UserId::fromString($this->aggregateId());
    }

    public function updatedAt(): UpdatedAt
    {
        return new UpdatedAt(\DateTimeImmutable::createFromFormat(\DATE_ATOM, $this->payload()['updatedAt']));
    }

    public function locale(): Locale
    {
        return new Locale($this->payload()['locale']);
    }
}