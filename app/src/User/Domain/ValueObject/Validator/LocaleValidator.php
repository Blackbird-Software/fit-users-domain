<?php
declare(strict_types=1);

namespace App\User\Domain\ValueObject\Validator;

use App\User\Domain\Enum\LocaleEnum;
use App\Common\Domain\ValueObject\Validator\ValidatorInterface;

final class LocaleValidator implements ValidatorInterface
{
    public function isValid($value): bool
    {
        return LocaleEnum::has($value);
    }
}