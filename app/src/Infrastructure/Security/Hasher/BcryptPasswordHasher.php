<?php
declare(strict_types=1);

namespace App\Infrastructure\Security\Hasher;

final class BcryptPasswordHasher implements PasswordHasherInterface
{
    public function __invoke(string $password): string
    {
        return password_hash($password, \PASSWORD_BCRYPT, ['cost' => 12]);
    }
}