<?php

declare(strict_types=1);

namespace App\User\Infrastructure\Validator;

use App\User\Domain\ValueObject\Email;
use App\User\Infrastructure\ReadModel\Exception\UserViewNotFoundException;
use App\User\Infrastructure\ReadModel\Repository\UserViews;
use App\User\Infrastructure\Validator\Constraints\UserHasBeenAlreadyRegistered;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

class UserHasBeenAlreadyRegisteredValidator extends ConstraintValidator
{
    private UserViews $users;

    public function __construct(UserViews $users)
    {
        $this->users = $users;
    }

    public function validate($value, Constraint $constraint): void
    {
        if (!$constraint instanceof UserHasBeenAlreadyRegistered) {
            throw new UnexpectedTypeException($constraint, UserHasBeenAlreadyRegistered::class);
        }

        try {
            $user = $this->users->getByEmail(new Email($value));

            if ($user) {
                $this->context->buildViolation($constraint->getMessage())
                    ->addViolation();
            }

        } catch (UserViewNotFoundException $exception) {
        }
    }
}