<?php
declare(strict_types=1);

namespace App\Infrastructure\Controller\Action;

use App\Application\Repository\UsersRepositoryInterface;
use App\Infrastructure\Service\Generator\IdGeneratorInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class RemoveAction
{
    private UsersRepositoryInterface $repository;

    private IdGeneratorInterface $generator;

    public function __construct(UsersRepositoryInterface $repository, IdGeneratorInterface $generator)
    {
        $this->repository = $repository;
        $this->generator = $generator;
    }

    public function __invoke(Request $request): Response
    {
        $id = $request->attributes->get('id');
        $user = $this->repository->get($this->generator->generateFromString($id));
        $this->repository->remove($user);

        return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }
}