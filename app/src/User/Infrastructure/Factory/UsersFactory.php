<?php
declare(strict_types=1);

namespace App\User\Infrastructure\Factory;

use App\User\Domain\Exception\UserNotFoundException;
use App\User\Domain\Model\User;
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
use App\User\Domain\ValueObject\UserId;
use App\User\Infrastructure\DTO\RegisterUserRequest;
use App\User\Infrastructure\Security\Hasher\PasswordHasherInterface;
use App\Shared\Infrastructure\Generator\IdGeneratorInterface;

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
     * @throws UserNotFoundException
     */
    public function fromArray(array $params): UserInterface
    {
        if (!$params) {
            throw new UserNotFoundException();
        }

        return new User(
            new UserId($this->generator->generateFromString($params['id'])),
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
        return User::register(
            new UserId($this->generator->generate()),
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