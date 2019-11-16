<?php
declare(strict_types=1);

namespace App\User\Infrastructure\View\Factory;

use App\User\Infrastructure\View\Model\UserView;

final class UserViewsFactory implements UserViewsFactoryInterface
{
    public function fromArray(array $params): UserView
    {
        return new UserView(
            $params['id'],
            $params['firstname'],
            $params['lastname'],
            $params['email'],
            $params['created_at'],
            $params['locale']
        );
    }

}