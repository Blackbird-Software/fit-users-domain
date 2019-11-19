<?php

declare(strict_types=1);

namespace App\User\Infrastructure\DTO;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;

final class UpdateUserRequest extends AbstractUserRequest
{
    /**
     * @Assert\NotBlank
     */
    private $id;

    public function __construct(Request $request)
    {
        $this->id = $request->attributes->get('id');
        parent::__construct($request);
    }

    public function id(): string
    {
        return $this->id;
    }
}
