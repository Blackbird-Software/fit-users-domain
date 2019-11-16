<?php
declare(strict_types=1);

namespace App\User\Infrastructure\View\Factory;

use App\User\Infrastructure\View\Model\UserView;

interface UserViewsFactoryInterface
{
    public function fromArray(array $params): UserView;
}