<?php
declare(strict_types=1);

namespace App\Common\Infrastructure;

use App\Common\Domain\ValueObject\IdInterface;

final class RandomIntegerId implements IdInterface
{
    private int $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }

    public function __toString(): string
    {
        return (string) $this->value();
    }

    public function value(): int
    {
        return $this->id;
    }

    public static function fromString(string $string): IdInterface
    {
       return new self((int) $string);
    }
}