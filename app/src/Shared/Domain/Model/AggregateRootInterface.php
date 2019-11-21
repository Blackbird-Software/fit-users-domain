<?php

declare(strict_types=1);

namespace App\Shared\Domain\Model;

use App\Shared\Domain\Event\AggregateChanged;

interface AggregateRootInterface
{
    public function record(AggregateChanged $event) : void;

    public function popRecordedEvents(): array;

    // @TODO should not be public! IMPORTANT!!!
    public function apply(AggregateChanged $event): void;

    public function aggregateId(): string;
}