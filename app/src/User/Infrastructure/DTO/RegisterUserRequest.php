<?php

declare(strict_types=1);

namespace App\User\Infrastructure\DTO;

use App\User\Infrastructure\Validator\Constraints\UserHasBeenAlreadyRegistered;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;

final class RegisterUserRequest extends AbstractUserRequest
{
    /**
     * @Assert\NotBlank
     * @Assert\Email
     * @UserHasBeenAlreadyRegistered
     */
    private $email;

    /**
     * @Assert\NotBlank
     * @Assert\Length(min="8")
     */
    private $password;

    public function __construct(Request $request)
    {
        $parameterBag = $request->request;
        $this->email = $parameterBag->get('email');
        $this->password = $parameterBag->get('password');
        parent::__construct($request);
    }

    public function email(): string
    {
        return $this->email;
    }

    public function password(): string
    {
        return $this->password;
    }
}
