<?php
declare(strict_types=1);

namespace App\User\Domain\ValueObject;

use App\Shared\Domain\ValueObject\IdInterface;
use App\Shared\Domain\ValueObject\ValueObjectInterface;

final class UserId implements ValueObjectInterface
{
    private string $value;

    public function __construct(IdInterface $id)
    {
        $this->value = (string) $id->value();
    }

    public function __toString(): string
    {
        return (string) $this->value;
    }

    public function value(): string
    {
       return $this->value;
    }
}