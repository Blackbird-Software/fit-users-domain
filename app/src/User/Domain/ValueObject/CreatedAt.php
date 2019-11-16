<?php
declare(strict_types=1);

namespace App\User\Domain\ValueObject;

use App\Shared\Domain\ValueObject\ValueObjectInterface;
use App\User\Domain\ValueObject\Exception\InvalidCreatedAtException;
use App\User\Domain\ValueObject\Validator\CreatedAtValidator;

final class CreatedAt implements ValueObjectInterface
{
    private \DateTimeImmutable $value;

    /** @throws InvalidCreatedAtException */
    public function __construct(\DateTimeImmutable $value)
    {
        $validator = new CreatedAtValidator();

        if(!($validator->isValid($value))) {
            throw new InvalidCreatedAtException();
        }

        $this->value = $value;
    }

    public function __toString(): string
    {
        return $this->value()->format(\DATE_ATOM);
    }

    public function value(): \DateTimeImmutable
    {
        return $this->value;
    }
}