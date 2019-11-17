<?php
declare(strict_types=1);

namespace App\User\Infrastructure\ReadModel\Factory;

use App\User\Infrastructure\ReadModel\View\UserView;

interface UserViewsFactoryInterface
{
    public function fromArray(array $params): UserView;
}