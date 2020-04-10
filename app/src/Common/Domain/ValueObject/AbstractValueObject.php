<?php
declare(strict_types=1);

namespace App\Common\Domain\ValueObject;

abstract class AbstractValueObject implements ValueObjectInterface
{
    protected string $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function __toString(): string
    {
        return $this->value();
    }

    public function value(): string
    {
        return $this->value;
    }

    public function sameValueAs(ValueObjectInterface $other): bool
    {
        return $this->value() === $other->value();
    }
}