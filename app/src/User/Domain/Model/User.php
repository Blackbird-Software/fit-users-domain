<?php
declare(strict_types=1);

namespace App\User\Domain\Model;

use App\User\Domain\ValueObject\CreatedAt;
use App\User\Domain\ValueObject\Email;
use App\User\Domain\ValueObject\Firstname;
use App\User\Domain\ValueObject\Lastname;
use App\User\Domain\ValueObject\Locale;
use App\User\Domain\ValueObject\Password;
use App\User\Domain\ValueObject\UserId;

final class User implements UserInterface
{
    private UserId $id;

    private Firstname $firstname;

    private Lastname $lastname;

    private Email $email;

    private Password $password;

    private CreatedAt $createdAt;

    private Locale $locale;

    public function __construct(UserId $id, Firstname $firstname, Lastname $lastname, Email $email, Password $password,
                                 CreatedAt $createdAt, Locale $locale)
    {
        $this->id = $id;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->password = $password;
        $this->createdAt = $createdAt;
        $this->locale = $locale;
    }

    public static function register(UserId $id, Firstname $firstname, Lastname $lastname, Email $email, Password $password,
                                    CreatedAt $createdAt, Locale $locale): self
    {
        return new self($id, $firstname, $lastname, $email, $password, $createdAt, $locale);
    }

    public function id(): UserId
    {
        return $this->id;
    }

    public function firstname(): Firstname
    {
        return $this->firstname;
    }

    public function lastname(): Lastname
    {
        return $this->lastname;
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

    public function serialize(): array
    {
        return [
            'id' => $this->id()->value(),
            'firstname' => $this->firstname()->value(),
            'lastname' => $this->lastname()->value(),
            'email' => $this->email()->value(),
            'created_at' => $this->createdAt()->value()->format(\DATE_ATOM),
            'locale' => $this->locale()->value()
        ];
    }

    /** @throws \Exception */
    public function unserialize($serialized): self
    {
        // @TODO
        throw new \Exception('Object cannot be unserialized. ');
    }
}