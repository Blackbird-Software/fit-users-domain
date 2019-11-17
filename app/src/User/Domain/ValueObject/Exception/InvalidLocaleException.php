<?php
declare(strict_types=1);

namespace App\User\Domain\ValueObject\Exception;

final class InvalidLocaleException extends \DomainException
{
    protected $message = 'Invalid locale provided. ';
}