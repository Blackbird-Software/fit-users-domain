<?php
declare(strict_types=1);

namespace App\User\Domain\ValueObject\Validator;

use App\Shared\Domain\ValueObject\Validator\ValidatorInterface;

final class CreatedAtValidator implements ValidatorInterface
{
    public function isValid($value): bool
    {
        return $value <= new \DateTimeImmutable();
    }
}