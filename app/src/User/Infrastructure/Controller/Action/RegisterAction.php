<?php
declare(strict_types=1);

namespace App\User\Infrastructure\Controller\Action;

use App\User\Domain\Repository\Users;
use App\User\Infrastructure\DTO\RegisterUserRequest;
use App\User\Infrastructure\Factory\UsersFactoryInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class RegisterAction
{
    private Users $repository;

    private UsersFactoryInterface $factory;

    public function __construct(Users $repository, UsersFactoryInterface $factory)
    {
        $this->repository = $repository;
        $this->factory = $factory;
    }

    public function __invoke(RegisterUserRequest $request): Response
    {
        $user = $this->factory->fromDTO($request);
        $this->repository->add($user);

        return new JsonResponse($user->serialize(), Response::HTTP_CREATED);
    }
}