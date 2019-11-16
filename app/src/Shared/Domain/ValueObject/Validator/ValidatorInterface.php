<?php
declare(strict_types=1);

namespace App\Shared\Domain\ValueObject\Validator;

interface ValidatorInterface
{
    public function isValid($value): bool;
}