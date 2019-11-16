<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\Service\Generator;

use App\Shared\Domain\ValueObject\IdInterface;

interface IdGeneratorInterface
{
    public function generate(): IdInterface;

    public function generateFromString(string $value): IdInterface;
}