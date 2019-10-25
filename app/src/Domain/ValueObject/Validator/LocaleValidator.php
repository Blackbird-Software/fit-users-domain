<?php
declare(strict_types=1);

namespace App\Domain\ValueObject\Validator;

use App\Domain\Enum\LocaleEnum;

final class LocaleValidator implements ValidatorInterface
{
    public function isValid($value): bool
    {
        return LocaleEnum::has($value);
    }
}