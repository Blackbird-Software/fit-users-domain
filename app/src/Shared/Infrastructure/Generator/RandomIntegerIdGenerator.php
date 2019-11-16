<?php
declare(strict_types=1);

namespace App\Shared\Infrastructure\Generator;

use App\Shared\Domain\ValueObject\IdInterface;
use App\Shared\Infrastructure\RandomIntegerId;

final class RandomIntegerIdGenerator implements IdGeneratorInterface
{
    public function generate(): IdInterface
    {
        return new RandomIntegerId(mt_rand());
    }

    public function generateFromString(string $value): IdInterface
    {
        return new RandomIntegerId((int) $value);
    }
}