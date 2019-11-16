<?php
declare(strict_types=1);

namespace App\User\Domain\ValueObject\Exception;

final class InvalidEmailException extends \Exception
{
    protected $message = 'Invalid e-mail address provided. ';
}