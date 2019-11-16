<?php
declare(strict_types=1);

namespace App\User\Domain\ValueObject;

use App\Shared\Domain\ValueObject\AbstractValueObject;
use App\User\Domain\ValueObject\Exception\InvalidEmailException;
use App\User\Domain\ValueObject\Validator\EmailValidator;

final class Email extends AbstractValueObject
{
    /** @throws InvalidEmailException */
    public function __construct(string $value)
    {
        $validator = new EmailValidator();

        if(!($validator->isValid($value))) {
            throw new InvalidEmailException();
        }

        parent::__construct($value);
    }
}