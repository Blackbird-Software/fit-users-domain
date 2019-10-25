<?php
declare(strict_types=1);

namespace App\Domain\ValueObject\Validator;

final class EmailValidator implements ValidatorInterface
{
    public function isValid($value): bool
    {
        return filter_var($value, \FILTER_VALIDATE_EMAIL) !== true;
    }
}