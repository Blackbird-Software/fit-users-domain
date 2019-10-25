<?php
declare(strict_types=1);

namespace App\Domain\ValueObject\Validator;

final class CreatedAtValidator implements ValidatorInterface
{
    public function isValid($value): bool
    {
        return $value <= new \DateTimeImmutable();
    }
}