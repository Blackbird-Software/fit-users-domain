<?php
declare(strict_types=1);

namespace App\User\Infrastructure\Controller\Action;

use App\User\Domain\Repository\Users;
use App\User\Domain\Exception\UserNotFoundException;
use App\User\Domain\Model\NullUser;
use App\Shared\Infrastructure\Service\Generator\IdGeneratorInterface;
use App\User\Domain\ValueObject\UserId;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class GetAction
{
    private Users $repository;

    private IdGeneratorInterface $generator;

    public function __construct(Users $repository, IdGeneratorInterface $generator)
    {
        $this->repository = $repository;
        $this->generator = $generator;
    }

    /**
     * @throws UserNotFoundException
     */
    public function __invoke(Request $request): Response
    {
        // @TODO refactor
        $id = $request->attributes->get('id');
        $stringId = $this->generator->generateFromString($id);
        $user = $this->repository->get(new UserId($stringId));

        // @TODO refactor
        if($user instanceof NullUser) {
            throw new UserNotFoundException();
        }

        return new JsonResponse($user->serialize(), Response::HTTP_OK);
    }
}