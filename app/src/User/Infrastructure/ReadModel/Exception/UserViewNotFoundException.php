<?php

declare(strict_types=1);

namespace App\User\Infrastructure\ReadModel\Exception;

final class UserViewNotFoundException extends \Exception
{
    protected $message = 'User not found. ';
}