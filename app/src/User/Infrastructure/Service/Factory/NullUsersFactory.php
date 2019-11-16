<?php
declare(strict_types=1);

namespace App\User\Infrastructure\Service\Factory;

use App\User\Domain\Model\NullUser;
use App\User\Domain\Model\UserInterface;
use App\User\Domain\ValueObject\CreatedAt;
use App\User\Domain\ValueObject\Email;
use App\User\Domain\ValueObject\Exception\InvalidCreatedAtException;
use App\User\Domain\ValueObject\Exception\InvalidEmailException;
use App\User\Domain\ValueObject\Exception\InvalidLocaleException;
use App\User\Domain\ValueObject\Exception\InvalidPasswordException;
use App\User\Domain\ValueObject\Firstname;
use App\User\Domain\ValueObject\Lastname;
use App\User\Domain\ValueObject\Locale;
use App\User\Domain\ValueObject\Password;
use App\User\Infrastructure\DTO\RegisterUserRequest;
use App\User\Infrastructure\Security\Hasher\PasswordHasherInterface;
use App\Shared\Infrastructure\Service\Generator\IdGeneratorInterface;

final class NullUsersFactory implements UsersFactoryInterface
{
    private IdGeneratorInterface $generator;

    private PasswordHasherInterface $hasher;

    public function __construct(IdGeneratorInterface $generator, PasswordHasherInterface $hasher)
    {
        $this->generator = $generator;
        $this->hasher = $hasher;
    }

    public function fromArray(array $params): UserInterface
    {
        return new NullUser();
    }

    /**
     * @throws InvalidCreatedAtException
     * @throws InvalidEmailException
     * @throws InvalidLocaleException
     * @throws InvalidPasswordException
     */
    public function fromDTO(RegisterUserRequest $request): UserInterface
    {
        return NullUser::register(
            $this->generator->generate(),
            new Firstname($request->firstname()),
            new Lastname($request->lastname()),
            new Email($request->email()),
            new Password(($this->hasher)($request->password())),
            new CreatedAt(new \DateTimeImmutable()),
            new Locale($request->locale())
        );
    }

    public function toArray(UserInterface $user): array
    {
        return [];
    }
}