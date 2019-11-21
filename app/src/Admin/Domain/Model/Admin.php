<?php
declare(strict_types=1);

namespace App\Admin\Domain\Model;

use App\Admin\Domain\Event\AdminWasCreated;
use App\Shared\Domain\Event\AggregateChanged;
use App\Shared\Domain\Model\AggregateRoot;
use App\Admin\Domain\Event\AdminWasUpdated;
use App\User\Domain\ValueObject\CreatedAt;
use App\User\Domain\ValueObject\Email;
use App\User\Domain\ValueObject\Locale;
use App\User\Domain\ValueObject\Password;
use App\User\Domain\ValueObject\UpdatedAt;
use App\User\Domain\ValueObject\UserId;

final class Admin extends AggregateRoot implements AdminInterface
{
    private UserId $id;

    private Email $email;

    private Password $password;

    private CreatedAt $createdAt;

    private ?UpdatedAt $updatedAt = null;

    private Locale $locale;

    private function __construct(UserId $id, Email $email, Password $password, CreatedAt $createdAt, Locale $locale)
    {
        $this->record(new AdminWasCreated($id->value(), [
            'email' => $email->value(),
            'password' => $password->value(),
            'createdAt' => $createdAt->value()->format(\DATE_ATOM),
            'locale' => $locale->value()
        ]));
    }

    public function aggregateId(): string
    {
        return $this->id()->value();
    }

    public static function create(UserId $id, Email $email, Password $password, CreatedAt $createdAt, Locale $locale): AdminInterface
    {
        return new self($id, $email, $password, $createdAt, $locale);
    }

    public function update(UpdatedAt $updatedAt, Locale $locale): void
    {
        $this->record(new AdminWasUpdated($this->id()->value(), [
            'updatedAt' => $updatedAt->value()->format(\DATE_ATOM),
            'locale' => $locale->value()
        ]));
    }

    public function apply(AggregateChanged $event): void
    {
        switch (get_class($event)) {
            case AdminWasCreated::class:
                $this->id = $event->id();
                $this->email = $event->email();
                $this->password = $event->password();
                $this->createdAt = $event->createdAt();
                $this->locale = $event->locale();
                break;
            case AdminWasUpdated::class:
                $this->id = $event->id();
                $this->updatedAt = $event->updatedAt();
                $this->locale = $event->locale();
                break;
            default:
                throw new \RuntimeException(sprintf('Unknown event type %s', get_class($event)));
                break;
        }
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

    public function updatedAt(): ?UpdatedAt
    {
        return $this->updatedAt;
    }
}