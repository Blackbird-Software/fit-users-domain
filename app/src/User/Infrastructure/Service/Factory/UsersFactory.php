<?php
declare(strict_types=1);

namespace App\User\Infrastructure\Service\Factory;

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
use App\Shared\Infrastructure\Service\Generator\IdGeneratorInterface;

final class UsersFactory implements UsersFactoryInterface
{
    private IdGeneratorInterface $generator;

    private PasswordHasherInterface $hasher;

    private NullUsersFactory $nullFactory;

    public function __construct(IdGeneratorInterface $generator, PasswordHasherInterface $hasher,
                                NullUsersFactory $nullFactory)
    {
        $this->generator = $generator;
        $this->hasher = $hasher;
        $this->nullFactory = $nullFactory;
    }

    /**
     * @throws InvalidCreatedAtException
     * @throws InvalidEmailException
     * @throws InvalidLocaleException
     * @throws InvalidPasswordException
     */
    public function fromArray(array $params): UserInterface
    {
        if (!$params) {
            return $this->nullFactory->fromArray($params);
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
        if (!$request) {
            return $this->nullFactory->fromDTO($request);
        }

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
        if (!$user) {
            return $this->nullFactory->toArray($user);
        }

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