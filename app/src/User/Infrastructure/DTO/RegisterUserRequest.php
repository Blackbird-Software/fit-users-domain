<?php

declare(strict_types=1);

namespace App\User\Infrastructure\DTO;

use App\Shared\Infrastructure\DTO\RequestDTOInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;
use App\User\Domain\Enum\LocaleEnum;

final class RegisterUserRequest implements RequestDTOInterface
{
    /**
     * @Assert\NotBlank
     */
    private $firstname;

    /**
     * @Assert\NotBlank
     */
    private $lastname;

    /**
     * @Assert\NotBlank
     * @Assert\Email
     */
    private $email;

    /**
     * @Assert\NotBlank
     * @Assert\Length(min="8")
     */
    private $password;

    /**
     * @Assert\NotBlank
     * @Assert\Choice(callback={LocaleEnum::class, "getValues"})
     */
    private $locale;

    public function __construct(Request $request)
    {
        $parameterBag = $request->request;
        $this->firstname = $parameterBag->getAlpha('firstname');
        $this->lastname = $parameterBag->getAlpha('lastname');
        $this->email = $parameterBag->get('email');
        $this->password = $parameterBag->get('password');
        $this->locale = $parameterBag->getAlpha('locale');
    }

    public function firstname(): string
    {
        return $this->firstname;
    }

    public function lastname(): string
    {
        return $this->lastname;
    }

    public function email(): string
    {
        return $this->email;
    }

    public function password(): string
    {
        return $this->password;
    }

    public function locale(): string
    {
        return $this->locale;
    }
}
