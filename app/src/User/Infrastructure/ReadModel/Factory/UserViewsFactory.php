<?php
declare(strict_types=1);

namespace App\User\Infrastructure\ReadModel\Factory;

use App\User\Infrastructure\ReadModel\Exception\UserViewNotFoundException;
use App\User\Infrastructure\ReadModel\View\UserView;

final class UserViewsFactory implements UserViewsFactoryInterface
{
    /**
     * @throws UserViewNotFoundException
     */
    public function fromArray(array $params): UserView
    {
        if(!$params) {
            throw new UserViewNotFoundException();
        }

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