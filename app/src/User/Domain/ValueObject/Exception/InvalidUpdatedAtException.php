<?php
declare(strict_types=1);

namespace App\User\Domain\ValueObject\Exception;

final class InvalidUpdatedAtException extends \DomainException
{
    protected $message = 'Invalid created date provided. ';
}