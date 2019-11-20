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

    public function __construct(UserId $id, Email $email, Password $password, CreatedAt $createdAt, Locale $locale)
    {
        $this->id = $id;
        $this->email = $email;
        $this->password = $password;
        $this->createdAt = $createdAt;
        $this->locale = $locale;
    }

    public function jsonSerialize(): array
    {
        return [
            $this->id->value(),
            $this->email->value(),
            $this->password->value(),
            $this->createdAt->value()->format(\DATE_ATOM),
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