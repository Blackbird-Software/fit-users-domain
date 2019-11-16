<?php
declare(strict_types=1);

namespace App\Domain\Model;

use App\Domain\ValueObject\CreatedAt;
use App\Domain\ValueObject\Email;
use App\Domain\ValueObject\Firstname;
use App\Domain\ValueObject\IdInterface;
use App\Domain\ValueObject\Lastname;
use App\Domain\ValueObject\Locale;
use App\Domain\ValueObject\Password;

final class NullUser implements UserInterface
{
    public static function register(IdInterface $id, Firstname $firstname, Lastname $lastname, Email $email,
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