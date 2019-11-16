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

interface UserInterface
{
    public static function register(UserId $id, Firstname $firstname, Lastname $lastname, Email $email, Password $password, CreatedAt $createdAt, Locale $locale): self;
}