<?php
declare(strict_types=1);

namespace App\User\Domain\ValueObject;

use App\Common\Domain\ValueObject\AbstractValueObject;
use App\User\Domain\ValueObject\Exception\InvalidPasswordException;
use App\User\Domain\ValueObject\Validator\PasswordValidator;

final class Password extends AbstractValueObject
{
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