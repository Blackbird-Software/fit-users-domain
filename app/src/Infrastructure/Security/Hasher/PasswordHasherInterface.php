<?php
declare(strict_types=1);

namespace App\Infrastructure\Security\Hasher;

interface PasswordHasherInterface
{
    public function __invoke(string $password): string;
}
