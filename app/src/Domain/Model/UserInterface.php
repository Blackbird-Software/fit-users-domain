<?php
declare(strict_types=1);

namespace App\Domain\Model;

use App\Domain\ValueObject\AbstractPassword;
use App\Domain\ValueObject\CreatedAt;
use App\Domain\ValueObject\Email;
use App\Domain\ValueObject\Firstname;
use App\Domain\ValueObject\IdInterface;
use App\Domain\ValueObject\Lastname;
use App\Domain\ValueObject\Locale;
use App\Domain\ValueObject\Password;

interface UserInterface extends \Serializable
{
    public static function create(IdInterface $id, Firstname $firstname, Lastname $lastname, Email $email, Password $password, CreatedAt $createdAt, Locale $locale): self;

    public function id(): IdInterface;

    public function firstname(): Firstname;

    public function lastname(): Lastname;

    public function email(): Email;

    public function password(): Password;

    public function createdAt(): CreatedAt;

    public function locale(): Locale;
}