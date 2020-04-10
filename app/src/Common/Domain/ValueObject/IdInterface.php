<?php
declare(strict_types=1);

namespace App\Common\Domain\ValueObject;

interface IdInterface extends ValueObjectInterface
{
    public static function fromString(string $string): self;
}