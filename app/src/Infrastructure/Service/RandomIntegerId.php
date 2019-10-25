<?php
declare(strict_types=1);

namespace App\Infrastructure\Service;

use App\Domain\ValueObject\IdInterface;

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
}