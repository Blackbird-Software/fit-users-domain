<?php
declare(strict_types=1);

namespace App\Domain\ValueObject\Exception;

final class InvalidCreatedAtException extends \Exception
{
    protected $message = 'Invalid created date provided. ';
}