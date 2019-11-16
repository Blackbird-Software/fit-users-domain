<?php
declare(strict_types=1);

namespace App\Infrastructure\Service\Factory;

use App\Domain\Model\NullUser;
use App\Domain\Model\UserInterface;
use App\Domain\ValueObject\CreatedAt;
use App\Domain\ValueObject\Email;
use App\Domain\ValueObject\Exception\InvalidCreatedAtException;
use App\Domain\ValueObject\Exception\InvalidEmailException;
use App\Domain\ValueObject\Exception\InvalidLocaleException;
use App\Domain\ValueObject\Exception\InvalidPasswordException;
use App\Domain\ValueObject\Firstname;
use App\Domain\ValueObject\Lastname;
use App\Domain\ValueObject\Locale;
use App\Domain\ValueObject\Password;
use App\Infrastructure\DTO\RegisterUserRequest;
use App\Infrastructure\Security\Hasher\PasswordHasherInterface;
use App\Infrastructure\Service\Generator\IdGeneratorInterface;

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