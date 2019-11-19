<?php

declare(strict_types=1);

namespace Tests\Behat\Context\Transform;

use App\User\Domain\ValueObject\Email;
use App\User\Infrastructure\ReadModel\Repository\UserViews;
use App\User\Infrastructure\ReadModel\View\UserView;
use Behat\Behat\Context\Context;

final class UserViewContext implements Context
{
    /** @var UserViews */
    private $userViews;

    public function __construct(UserViews $userViews)
    {
        $this->userViews = $userViews;
    }

    /**
     * @Transform :userView
     */
    public function getUserByEmail(string $email): UserView
    {
        // @TODO ReadModel without Email VO? What about unhandled exception?
        return $this->userViews->getByEmail(new Email($email));
    }
}