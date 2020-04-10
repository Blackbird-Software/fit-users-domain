<?php
declare(strict_types=1);

namespace App\Common\Domain\ValueObject\Validator;

interface ValidatorInterface
{
    public function isValid($value): bool;
}