<?php
declare(strict_types=1);

namespace App\User\Domain\Exception;

final class UserNotFoundException extends \DomainException
{
    protected $message = 'User not found. ';
}