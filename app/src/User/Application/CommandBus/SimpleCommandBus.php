<?php

declare(strict_types=1);

namespace App\User\Application\CommandBus;

use App\Shared\Application\CommandBusInterface;
use App\Shared\Application\CommandHandlerInterface;
use App\Shared\Application\CommandInterface;
use Assert\Assertion;
use Assert\AssertionFailedException;

final class SimpleCommandBus implements CommandBusInterface
{
    private $handlers = [];

    /**
     * @throws AssertionFailedException
     */
    public function subscribe(string $commandClass, CommandHandlerInterface $handler): void
    {
        Assertion::methodExists("handle", $handler);

        $this->handlers[$commandClass] = $handler;
    }

    /**
     * @throws AssertionFailedException
     */
    public function dispatch(CommandInterface $command): void
    {
        Assertion::keyExists($this->handlers, get_class($command));

        $this->handlers[get_class($command)]->handle($command);
    }
}