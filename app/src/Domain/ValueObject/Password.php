<?php
declare(strict_types=1);

namespace App\Domain\ValueObject;

use App\Domain\ValueObject\Exception\InvalidPasswordException;
use App\Domain\ValueObject\Validator\PasswordValidator;

class Password extends AbstractValueObject
{
    public const PASSWORD_MIN_CHARS = 8;

    /** @throws InvalidPasswordException */
    public function __construct(string $value)
    {
        $validator = new PasswordValidator();

        if(!($validator->isValid($value))) {
            throw new InvalidPasswordException();
        }

        parent::__construct($value);
    }
}