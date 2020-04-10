<?php

declare(strict_types=1);

namespace App\User\Application\Command;

use App\Common\Application\CommandInterface;
use App\User\Domain\ValueObject\Firstname;
use App\User\Domain\ValueObject\Lastname;
use App\User\Domain\ValueObject\Locale;
use App\User\Domain\ValueObject\UpdatedAt;
use App\User\Domain\ValueObject\UserId;
use App\User\Infrastructure\DTO\UpdateUserRequest;

final class UpdateUserCommand implements CommandInterface
{
    private UserId $id;

    private Firstname $firstname;

    private Lastname $lastname;

    private Locale $locale;

    private UpdatedAt $updatedAt;

    public function __construct(UpdateUserRequest $request, UserId $userId)
    {
        $this->id = $userId;
        $this->firstname = new Firstname($request->firstname());
        $this->lastname = new Lastname($request->lastname());
        $this->locale = new Locale($request->locale());
        $this->updatedAt = new UpdatedAt(new \DateTimeImmutable());
    }

    public static function create(UpdateUserRequest $request, UserId $userId): self
    {
        return new self($request, $userId);
    }

    public function id(): UserId
    {
        return $this->id;
    }

    public function firstname(): Firstname
    {
        return $this->firstname;
    }

    public function lastname(): Lastname
    {
        return $this->lastname;
    }

    public function locale(): Locale
    {
        return $this->locale;
    }

    public function updatedAt(): UpdatedAt
    {
        return $this->updatedAt;
    }
}