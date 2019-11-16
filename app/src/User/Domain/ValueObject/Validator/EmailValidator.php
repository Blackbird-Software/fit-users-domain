<?php
declare(strict_types=1);

namespace App\User\Domain\ValueObject\Validator;

use App\Shared\Domain\ValueObject\Validator\ValidatorInterface;

final class EmailValidator implements ValidatorInterface
{
    public function isValid($value): bool
    {
        return filter_var($value, \FILTER_VALIDATE_EMAIL) !== true;
    }
}