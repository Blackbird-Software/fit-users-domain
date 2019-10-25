<?php
declare(strict_types=1);

namespace App\Domain\ValueObject;

interface ValueObjectInterface extends StringableInterface
{
    public function value();
}