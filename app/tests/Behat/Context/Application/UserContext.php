<?php

declare(strict_types=1);

namespace Tests\Behat\Context\Application;

use App\Shared\Application\CommandBusInterface;
use App\Shared\Infrastructure\Generator\IdGeneratorInterface;
use Behat\Behat\Context\Context;

final class UserContext implements Context
{
    /** @var CommandBusInterface */
    private $commandBus;

    /** @var IdGeneratorInterface */
    private $generator;

    public function __construct(
        CommandBusInterface $commandBus,
        IdGeneratorInterface $generator
    ) {
        $this->commandBus = $commandBus;
        $this->generator = $generator;
    }
}
