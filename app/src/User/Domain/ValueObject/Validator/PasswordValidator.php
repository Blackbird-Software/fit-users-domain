<?php
declare(strict_types=1);

namespace App\User\Domain\ValueObject\Validator;

use App\Shared\Domain\ValueObject\Validator\ValidatorInterface;

final class PasswordValidator implements ValidatorInterface
{
    public function isValid($value): bool
    {
        // @TODO check min length
        return !empty($value);
    }
}