<?php
declare(strict_types=1);

namespace App\Common\Infrastructure\Generator;

use App\Common\Domain\ValueObject\IdInterface;
use App\Common\Infrastructure\RandomIntegerId;

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