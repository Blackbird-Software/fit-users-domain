<?php
declare(strict_types=1);

namespace App\Domain\ValueObject\Exception;

final class InvalidLocaleException extends \Exception
{
    protected $message = 'Invalid locale provided. ';
}