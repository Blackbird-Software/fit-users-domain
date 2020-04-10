<?php

namespace App\Admin\Domain\Event;

use App\Common\Domain\Event\AggregateChanged;
use App\User\Domain\ValueObject\CreatedAt;
use App\User\Domain\ValueObject\Email;
use App\User\Domain\ValueObject\Locale;
use App\User\Domain\ValueObject\Password;
use App\User\Domain\ValueObject\UserId;

final class AdminWasCreated extends AggregateChanged
{
    public static function withData(UserId $id, Email $email, Password $password, CreatedAt $createdAt,
                                    Locale $locale): AdminWasCreated
    {
        return self::occur(
            $id->value(),
            [
                'email' => $email->value(),
                'password' => $password->value(),
                'createdAt' => $createdAt->value()->format(\DATE_ATOM),
                'locale' => $locale->value()
            ]
        );
    }

    // remove?
    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id()->value(),
            'email' => $this->email()->value(),
            'password' => $this->password()->value(),
            'createdAt' => $this->createdAt()->value()->format(\DATE_ATOM),
            'locale' => $this->locale()->value()
        ];
    }

    public function id(): UserId
    {
        return UserId::fromString($this->aggregateId());
    }

    public function email(): Email
    {
        return new Email($this->payload()['email']);
    }

    public function password(): Password
    {
        return new Password($this->payload()['password']);
    }

    public function createdAt(): CreatedAt
    {
        return new CreatedAt(\DateTimeImmutable::createFromFormat(\DATE_ATOM, $this->payload()['createdAt']));
    }

    public function locale(): Locale
    {
        return new Locale($this->payload()['locale']);
    }
}