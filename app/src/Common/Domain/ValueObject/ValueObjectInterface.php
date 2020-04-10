<?php
declare(strict_types=1);

namespace App\Common\Domain\ValueObject;

interface ValueObjectInterface extends StringableInterface
{
    public function value();
}