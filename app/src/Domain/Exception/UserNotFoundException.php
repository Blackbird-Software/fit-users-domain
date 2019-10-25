<?php
declare(strict_types=1);

namespace App\Domain\Exception;

final class UserNotFoundException extends \Exception
{
    protected $message = 'User not found. ';
}