<?php

declare(strict_types=1);

namespace App\User\Infrastructure\DTO;

use App\Shared\Infrastructure\DTO\RequestDTOInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;
use App\User\Domain\Enum\LocaleEnum;

abstract class AbstractUserRequest implements RequestDTOInterface
{
    /**
     * @Assert\NotBlank
     */
    protected $firstname;

    /**
     * @Assert\NotBlank
     */
    protected $lastname;

    /**
     * @Assert\NotBlank
     * @Assert\Choice(callback={LocaleEnum::class, "getValues"})
     */
    protected $locale;

    public function __construct(Request $request)
    {
        $parameterBag = $request->request;
        $this->firstname = $parameterBag->getAlpha('firstname');
        $this->lastname = $parameterBag->getAlpha('lastname');
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

    public function locale(): string
    {
        return $this->locale;
    }
}
