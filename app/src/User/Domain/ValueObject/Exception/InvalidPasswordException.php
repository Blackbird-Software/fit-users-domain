<?php
declare(strict_types=1);

namespace App\User\Domain\ValueObject\Exception;

final class InvalidPasswordException extends \Exception
{
    protected $message = 'Invalid password provided. ';
}