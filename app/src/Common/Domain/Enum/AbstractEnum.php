<?php

declare(strict_types=1);

namespace App\Common\Domain\Enum;

use MabeEnum\Enum as MabeEnum;
use MabeEnum\EnumSerializableTrait;
use Serializable;

abstract class AbstractEnum extends MabeEnum implements Serializable
{
    use EnumSerializableTrait;
}
