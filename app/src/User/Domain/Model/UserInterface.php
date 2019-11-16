<?php
declare(strict_types=1);

namespace App\User\Domain\Model;

use App\User\Domain\ValueObject\CreatedAt;
use App\User\Domain\ValueObject\Email;
use App\User\Domain\ValueObject\Firstname;
use App\Shared\Domain\ValueObject\IdInterface;
use App\User\Domain\ValueObject\Lastname;
use App\User\Domain\ValueObject\Locale;
use App\User\Domain\ValueObject\Password;

interface UserInterface extends \Serializable
{
    public static function register(IdInterface $id, Firstname $firstname, Lastname $lastname, Email $email, Password $password, CreatedAt $createdAt, Locale $locale): self;
}