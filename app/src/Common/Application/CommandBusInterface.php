<?php

declare(strict_types=1);

namespace App\Common\Application;

interface CommandBusInterface
{
    public function subscribe(string $commandClass, CommandHandlerInterface $handler): void;

    public function dispatch(CommandInterface $command): void;
}