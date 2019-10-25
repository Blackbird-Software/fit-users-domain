<?php
declare(strict_types=1);

namespace App\Infrastructure\Service\Factory;

use App\Domain\Model\User;
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

final class UsersFactory implements UsersFactoryInterface
{
    private IdGeneratorInterface $generator;

    private PasswordHasherInterface $hasher;

    public function __construct(IdGeneratorInterface $generator, PasswordHasherInterface $hasher)
    {
        $this->generator = $generator;
        $this->hasher = $hasher;
    }

    /**
     * @throws InvalidCreatedAtException
     * @throws InvalidEmailException
     * @throws InvalidLocaleException
     * @throws InvalidPasswordException
     */
    public function fromArray(array $params): ?UserInterface
    {
        // should be better NullObject?
        if (!$params) {
            return null;
        }

        return User::create(
            $this->generator->generateFromString($params['id']),
            new Firstname($params['firstname']),
            new Lastname($params['lastname']),
            new Email($params['email']),
            new Password($params['password']),
            new CreatedAt(\DateTimeImmutable::createFromFormat(\DATE_ATOM, $params['created_at'])),
            new Locale($params['locale'])
        );
    }

    /**
     * @throws InvalidCreatedAtException
     * @throws InvalidEmailException
     * @throws InvalidLocaleException
     * @throws InvalidPasswordException
     */
    public function fromDTO(RegisterUserRequest $request): UserInterface
    {
        return User::create(
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
        return [
            'id' => $user->id()->value(),
            'firstname' => $user->firstname()->value(),
            'lastname' => $user->lastname()->value(),
            'email' => $user->email()->value(),
            'password' => $user->password()->value(),
            'created_at' => $user->createdAt()->value()->format(\DATE_ATOM),
            'locale' => $user->locale()->value()
        ];
    }
}