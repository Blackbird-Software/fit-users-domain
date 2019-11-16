<?php
declare(strict_types=1);

namespace App\Shared\Domain\ValueObject;

interface StringableInterface
{
    public function __toString(): string;

}