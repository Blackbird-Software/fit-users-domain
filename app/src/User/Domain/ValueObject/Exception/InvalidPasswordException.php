<?php
declare(strict_types=1);

namespace App\User\Domain\ValueObject\Exception;

final class InvalidPasswordException extends \DomainException
{
    protected $message = 'Invalid password provided. ';
}