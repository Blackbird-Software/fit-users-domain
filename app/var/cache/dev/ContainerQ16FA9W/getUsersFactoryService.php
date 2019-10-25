<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'App\Infrastructure\Service\Factory\UsersFactory' shared autowired service.

include_once $this->targetDirs[3].'/src/Infrastructure/Service/Factory/UsersFactoryInterface.php';
include_once $this->targetDirs[3].'/src/Infrastructure/Service/Factory/UsersFactory.php';
include_once $this->targetDirs[3].'/src/Infrastructure/Service/Generator/IdGeneratorInterface.php';
include_once $this->targetDirs[3].'/src/Infrastructure/Service/Generator/RandomIntegerIdGenerator.php';

return $this->services['App\\Infrastructure\\Service\\Factory\\UsersFactory'] = new \App\Infrastructure\Service\Factory\UsersFactory(($this->services['App\\Infrastructure\\Service\\Generator\\RandomIntegerIdGenerator'] ?? ($this->services['App\\Infrastructure\\Service\\Generator\\RandomIntegerIdGenerator'] = new \App\Infrastructure\Service\Generator\RandomIntegerIdGenerator())));
