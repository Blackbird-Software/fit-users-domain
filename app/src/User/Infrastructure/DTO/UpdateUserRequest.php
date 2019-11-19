<?php

declare(strict_types=1);

namespace App\User\Infrastructure\DTO;

use App\Shared\Infrastructure\DTO\RequestDTOInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;
use App\User\Domain\Enum\LocaleEnum;

final class UpdateUserRequest implements RequestDTOInterface
{
    /**
     * @Assert\NotBlank
     */
    private $id;

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
     * @Assert\Choice(callback={LocaleEnum::class, "getValues"})
     */
    private $locale;

    public function __construct(Request $request)
    {
        $parameterBag = $request->request;
        $this->id = $request->attributes->get('id');
        $this->firstname = $parameterBag->getAlpha('firstname');
        $this->lastname = $parameterBag->getAlpha('lastname');
        $this->locale = $parameterBag->getAlpha('locale');
    }

    public function id(): string
    {
        return $this->id;
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
