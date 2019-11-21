<?php

declare(strict_types=1);

namespace App\Admin\Domain\Event;

use App\Shared\Domain\Event\AggregateChanged;
use App\Shared\Domain\Event\EventTypeLocatorInterface;

final class EventTypeLocator implements EventTypeLocatorInterface
{
    private const EVENTS = [
        'AdminWasCreated' => AdminWasCreated::class,
        'AdminWasUpdated' => AdminWasUpdated::class
    ];

    public static function getClassNameByKey(string $key): string
    {
        if(\array_key_exists($key, self::EVENTS)) {
            return self::EVENTS[$key];
        }

        throw new \RuntimeException(sprintf('Unknown key type %s', $key));
    }

    public static function getKeyByEvent(AggregateChanged $event): string
    {
        $class = \get_class($event);
        $namespace = \explode('\\', $class);
        $className = \end($namespace);

        return $className;
    }
}