<?php
declare(strict_types=1);

namespace App\User\Domain\ValueObject\Exception;

final class InvalidCreatedAtException extends \DomainException
{
    protected $message = 'Invalid created date provided. ';
}