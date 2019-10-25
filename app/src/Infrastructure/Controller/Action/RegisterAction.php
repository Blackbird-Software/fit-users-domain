<?php
declare(strict_types=1);

namespace App\Infrastructure\Controller\Action;

use App\Application\Repository\UsersRepositoryInterface;
use App\Infrastructure\DTO\RegisterUserRequest;
use App\Infrastructure\Service\Factory\UsersFactoryInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class RegisterAction
{
    private UsersRepositoryInterface $repository;

    private UsersFactoryInterface $factory;

    public function __construct(UsersRepositoryInterface $repository, UsersFactoryInterface $factory)
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