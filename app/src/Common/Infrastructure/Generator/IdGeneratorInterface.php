<?php

declare(strict_types=1);

namespace App\Common\Infrastructure\Generator;

use App\Common\Domain\ValueObject\IdInterface;

interface IdGeneratorInterface
{
    public function generate(): IdInterface;

    public function generateFromString(string $value): IdInterface;
}