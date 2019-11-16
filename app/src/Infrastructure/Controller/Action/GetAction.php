<?php
declare(strict_types=1);

namespace App\Infrastructure\Controller\Action;

use App\Application\Repository\UsersRepositoryInterface;
use App\Domain\Exception\UserNotFoundException;
use App\Domain\Model\NullUser;
use App\Infrastructure\Service\Generator\IdGeneratorInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class GetAction
{
    private UsersRepositoryInterface $repository;

    private IdGeneratorInterface $generator;

    public function __construct(UsersRepositoryInterface $repository, IdGeneratorInterface $generator)
    {
        $this->repository = $repository;
        $this->generator = $generator;
    }

    /**
     * @throws UserNotFoundException
     */
    public function __invoke(Request $request): Response
    {
        $id = $request->attributes->get('id');
        $user = $this->repository->get($this->generator->generateFromString($id));

        if($user instanceof NullUser) {
            throw new UserNotFoundException();
        }

        return new JsonResponse($user->serialize(), Response::HTTP_OK);
    }
}