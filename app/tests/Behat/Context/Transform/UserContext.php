<?php

declare(strict_types=1);

namespace Tests\Behat\Context\Transform;

use App\User\Domain\Model\UserInterface;
use App\User\Domain\Repository\Users;
use Behat\Behat\Context\Context;
use Symfony\Component\Mime\Email;

final class UserContext implements Context
{
    /** @var Users */
    private $users;

    public function __construct(Users $users)
    {
        $this->users = $users;
    }

    /**
     * @Transform /^"([^"]+)" user$/
     * @Transform :user
     */
    public function getUserByEmail(string $email): UserInterface
    {
        // @TODO what about unhandled exception?
        return $this->users->getByEmail(new Email($email));
    }
}