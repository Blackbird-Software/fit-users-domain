<?php

namespace App\User\Infrastructure\Validator\Constraints;

use App\User\Infrastructure\Validator\UserHasBeenAlreadyRegisteredValidator;
use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class UserHasBeenAlreadyRegistered extends Constraint
{
    private $message = 'User with such e-mail has been already registered. ';

    public function getMessage(): string
    {
        return $this->message;
    }

    public function validatedBy(): string
    {
        return UserHasBeenAlreadyRegisteredValidator::class;
    }
}