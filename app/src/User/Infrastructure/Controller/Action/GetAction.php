<?php
declare(strict_types=1);

namespace App\User\Infrastructure\Controller\Action;

use App\Shared\Infrastructure\Controller\Action\AbstractAction;
use App\Shared\Infrastructure\Generator\IdGeneratorInterface;
use App\User\Domain\ValueObject\UserId;
use App\User\Infrastructure\View\Exception\UserViewNotFoundException;
use App\User\Infrastructure\View\Repository\UserViews;
use JMS\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class GetAction extends AbstractAction
{
    private UserViews $repository;

    private IdGeneratorInterface $generator;

    public function __construct(SerializerInterface $serializer, UserViews $repository, IdGeneratorInterface $generator)
    {
        $this->repository = $repository;
        $this->generator = $generator;
        parent::__construct($serializer);
    }

    /**
     * @throws UserViewNotFoundException
     */
    public function __invoke(Request $request): Response
    {
        $id = $this->generator->generateFromString($request->attributes->get('id'));
        $user = $this->repository->get(new UserId($id));

        return $this->createApiResponse($user);
    }
}