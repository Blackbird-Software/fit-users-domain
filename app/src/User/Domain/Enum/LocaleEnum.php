<?php
declare(strict_types=1);

namespace App\User\Domain\Enum;

use App\Shared\Domain\Enum\AbstractEnum;

final class LocaleEnum extends AbstractEnum
{
    public const ENGLISH = 'en';
    public const GERMAN = 'de';
    public const POLISH = 'pl';
}