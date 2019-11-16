<?php
declare(strict_types=1);

namespace App\User\Infrastructure\Security\Hasher;

final class Md5PasswordHasher implements PasswordHasherInterface
{
    public function __invoke(string $password): string
    {
        return md5($password);
    }
}