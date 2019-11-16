<?php
declare(strict_types=1);

namespace App\User\Infrastructure\Service\Factory;

use App\User\Domain\Model\UserInterface;
use App\User\Infrastructure\DTO\RegisterUserRequest;

interface UsersFactoryInterface
{
    public function fromArray(array $params): UserInterface;

    public function fromDTO(RegisterUserRequest $request): UserInterface;

    public function toArray(UserInterface $user): array;
}