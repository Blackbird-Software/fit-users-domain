<?php
declare(strict_types=1);

namespace App\Domain\ValueObject\Validator;

final class PasswordValidator implements ValidatorInterface
{
    public function isValid($value): bool
    {
        return !empty($value);
    }
}