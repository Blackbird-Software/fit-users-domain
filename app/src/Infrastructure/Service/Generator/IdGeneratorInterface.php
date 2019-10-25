<?php

declare(strict_types=1);

namespace App\Infrastructure\Service\Generator;

use App\Domain\ValueObject\IdInterface;

interface IdGeneratorInterface
{
    public function generate(): IdInterface;

    public function generateFromString(string $value): IdInterface;
}