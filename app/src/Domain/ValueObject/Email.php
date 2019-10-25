<?php
declare(strict_types=1);

namespace App\Domain\ValueObject;

use App\Domain\ValueObject\Exception\InvalidEmailException;
use App\Domain\ValueObject\Validator\EmailValidator;

class Email extends AbstractValueObject
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