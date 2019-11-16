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

final class NullUser implements UserInterface
{
    public static function register(UserId $id, Firstname $firstname, Lastname $lastname, Email $email,
                                    Password $password, CreatedAt $createdAt, Locale $locale): UserInterface
    {
        return new self;
    }

    public function serialize(): array
    {
        return [];
    }

    /** @throws \Exception */
    public function unserialize($serialized): self
    {
        // @TODO
        throw new \Exception('Object cannot be unserialized. ');
    }
}