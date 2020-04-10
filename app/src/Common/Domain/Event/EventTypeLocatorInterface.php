<?php

declare(strict_types=1);

namespace App\Common\Domain\Event;

interface EventTypeLocatorInterface
{
    public static function getClassNameByKey(string $key): string;

    public static function getKeyByEvent(AggregateChanged $event): string;
}