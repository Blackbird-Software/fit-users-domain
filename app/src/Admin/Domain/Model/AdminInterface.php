<?php
declare(strict_types=1);

namespace App\Admin\Domain\Model;

use App\User\Domain\ValueObject\CreatedAt;
use App\User\Domain\ValueObject\Email;
use App\User\Domain\ValueObject\Locale;
use App\User\Domain\ValueObject\Password;
use App\User\Domain\ValueObject\UpdatedAt;
use App\User\Domain\ValueObject\UserId;

interface AdminInterface
{
    public static function create(UserId $id, Email $email, Password $password, CreatedAt $createdAt, Locale $locale): self;

    public function update(UpdatedAt $updatedAt, Locale $locale): void;
}