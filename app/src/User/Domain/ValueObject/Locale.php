<?php
declare(strict_types=1);

namespace App\User\Domain\ValueObject;

use App\Shared\Domain\ValueObject\AbstractValueObject;
use App\User\Domain\ValueObject\Exception\InvalidLocaleException;
use App\User\Domain\ValueObject\Validator\LocaleValidator;

class Locale extends AbstractValueObject
{
    /**
     * @throws InvalidLocaleException
     */
    public function __construct(string $value)
    {
        $validator = new LocaleValidator();

        if(!($validator->isValid($value))) {
            throw new InvalidLocaleException();
        }

        parent::__construct($value);
    }
}