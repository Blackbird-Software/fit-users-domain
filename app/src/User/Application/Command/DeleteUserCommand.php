<?php

declare(strict_types=1);

namespace App\User\Application\Command;

use App\Common\Application\CommandInterface;
use App\User\Domain\ValueObject\UserId;

final class DeleteUserCommand implements CommandInterface
{
    private UserId $id;

    public function __construct(UserId $id)
    {
        $this->id = $id;
    }

    public static function create(UserId $id): self
    {
        return new self($id);
    }

    public function id(): UserId
    {
        return $this->id;
    }
}