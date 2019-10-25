<?php
declare(strict_types=1);

namespace App\Infrastructure\Service\Generator;

use App\Domain\ValueObject\IdInterface;
use App\Infrastructure\Service\RandomIntegerId;

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