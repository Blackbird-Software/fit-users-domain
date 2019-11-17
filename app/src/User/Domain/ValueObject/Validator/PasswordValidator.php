<?php
declare(strict_types=1);

namespace App\User\Domain\ValueObject\Validator;

use App\Shared\Domain\ValueObject\Validator\ValidatorInterface;
use App\User\Domain\ValueObject\Password;

final class PasswordValidator implements ValidatorInterface
{
    // @TODO NotEmptyValidator?
    public function isValid($value): bool
    {
        return !empty($value);
    }
}