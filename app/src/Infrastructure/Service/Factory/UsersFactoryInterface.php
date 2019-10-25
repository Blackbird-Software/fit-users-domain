<?php
declare(strict_types=1);

namespace App\Infrastructure\Service\Factory;

use App\Domain\Model\UserInterface;
use App\Infrastructure\DTO\RegisterUserRequest;

interface UsersFactoryInterface
{
    public function fromArray(array $params): ?UserInterface;

    public function fromDTO(RegisterUserRequest $request): UserInterface;

    public function toArray(UserInterface $user): array;
}