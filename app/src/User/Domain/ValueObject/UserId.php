<?php
declare(strict_types=1);

namespace App\User\Domain\ValueObject;

use App\Shared\Domain\ValueObject\IdInterface;
use App\Shared\Domain\ValueObject\ValueObjectInterface;

final class UserId implements ValueObjectInterface
{
    private string $value;

    /**
     * @TODO refactor types IMPORTANT!!!
     * @param IdInterface|string $id
     */
    public function __construct($id)
    {
        if($id instanceof IdInterface) {
            $this->value = (string) $id->value();
        } else {
            $this->value = $id;
        }
    }

    public function __toString(): string
    {
        return (string) $this->value;
    }

    public function value(): string
    {
       return $this->value;
    }

    public static function fromString(string $id): self
    {
        return new self($id);
    }
}