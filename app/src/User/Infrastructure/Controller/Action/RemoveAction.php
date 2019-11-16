<?php
declare(strict_types=1);

namespace App\User\Infrastructure\Controller\Action;

use App\Shared\Infrastructure\Controller\Action\AbstractAction;
use App\User\Domain\Repository\Users;
use App\Shared\Infrastructure\Generator\IdGeneratorInterface;
use App\User\Domain\ValueObject\UserId;
use JMS\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class RemoveAction extends AbstractAction
{
    private Users $repository;

    private IdGeneratorInterface $generator;

    public function __construct(SerializerInterface $serializer, Users $repository, IdGeneratorInterface $generator)
    {
        $this->repository = $repository;
        $this->generator = $generator;
        parent::__construct($serializer);
    }

    public function __invoke(Request $request): Response
    {
        $id = $this->generator->generateFromString($request->attributes->get('id'));
        $user = $this->repository->get(new UserId($id));

        $this->repository->remove($user);

        return $this->createApiResponse(null, Response::HTTP_NO_CONTENT);
    }
}