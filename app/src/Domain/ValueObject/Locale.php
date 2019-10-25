<?php
declare(strict_types=1);

namespace App\Domain\ValueObject;

use App\Domain\ValueObject\Exception\InvalidLocaleException;
use App\Domain\ValueObject\Validator\LocaleValidator;

class Locale extends AbstractValueObject
{
    public function __construct(string $value)
    {
        $validator = new LocaleValidator();

        if(!($validator->isValid($value))) {
            throw new InvalidLocaleException();
        }

        parent::__construct($value);
    }
}