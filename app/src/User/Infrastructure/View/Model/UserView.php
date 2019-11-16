<?php
declare(strict_types=1);

namespace App\User\Infrastructure\View\Model;

final class UserView
{
    private string $id;

    private string $email;

    private string $firstname;

    private string $lastname;

    private string $locale;

    private string $createdAt;

    /**
     * @throws \Exception
     */
    public function __construct(string $id, string $email, string $firstname, string $lastname, string $locale, string $createdAt)
    {
        $this->id = $id;
        $this->email = $email;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->locale = $locale;
        // @TODO adjust to user's timezone
        $this->createdAt = $createdAt;
    }

    public function id(): string
    {
        return $this->id;
    }

    public function email(): string
    {
        return $this->email;
    }

    public function firstname(): string
    {
        return $this->firstname;
    }

    public function lastname(): string
    {
        return $this->lastname;
    }

    public function locale(): string
    {
        return $this->locale;
    }

    public function createdAt(): string
    {
        return $this->createdAt;
    }
}