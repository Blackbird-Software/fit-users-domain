<?php

namespace App\Admin\Domain\Event;

use App\Shared\Domain\Event\AggregateChanged;
use App\User\Domain\ValueObject\CreatedAt;
use App\User\Domain\ValueObject\Email;
use App\User\Domain\ValueObject\Locale;
use App\User\Domain\ValueObject\Password;
use App\User\Domain\ValueObject\UserId;

final class AdminWasCreated extends AggregateChanged
{
    private UserId $id;

    private Email $email;

    private Password $password;

    private CreatedAt $createdAt;

    private Locale $locale;

    public function __construct(string $aggregateId, array $payload)
    {
        $this->id = UserId::fromString($aggregateId);
        $this->email = new Email($payload['email']);
        $this->password = new Password($payload['password']);
        $this->createdAt = new CreatedAt(\DateTimeImmutable::createFromFormat(\DATE_ATOM, $payload['createdAt']));
        $this->locale = new Locale($payload['locale']);
    }

    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id->value(),
            'email' => $this->email->value(),
            'password' => $this->password->value(),
            'createdAt' => $this->createdAt->value()->format(\DATE_ATOM),
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

    public function email(): Email
    {
        return $this->email;
    }

    public function password(): Password
    {
        return $this->password;
    }

    public function createdAt(): CreatedAt
    {
        return $this->createdAt;
    }

    public function locale(): Locale
    {
        return $this->locale;
    }
}