<?php
declare(strict_types=1);

namespace App\User\Infrastructure\Controller\Action;

use App\User\Domain\Repository\Users;
use App\Shared\Infrastructure\Generator\IdGeneratorInterface;
use App\User\Domain\ValueObject\UserId;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class RemoveAction
{
    private Users $repository;

    private IdGeneratorInterface $generator;

    public function __construct(Users $repository, IdGeneratorInterface $generator)
    {
        $this->repository = $repository;
        $this->generator = $generator;
    }

    public function __invoke(Request $request): Response
    {
        $id = $this->generator->generateFromString($request->attributes->get('id'));
        $user = $this->repository->get(new UserId($id));

        $this->repository->remove($user);

        return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }
}