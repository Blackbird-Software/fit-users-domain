<?php
declare(strict_types=1);

namespace App\User\Infrastructure\Controller\Action;

use App\Shared\Infrastructure\Controller\Action\AbstractAction;
use App\User\Domain\Repository\Users;
use App\User\Infrastructure\DTO\RegisterUserRequest;
use App\User\Infrastructure\Factory\UsersFactoryInterface;
use App\User\Infrastructure\View\UserViews;
use JMS\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Response;

final class RegisterAction extends AbstractAction
{
    private Users $repository;

    private UsersFactoryInterface $factory;

    private UserViews $readRepository;

    public function __construct(
        SerializerInterface $serializer,
        Users $repository,
        UsersFactoryInterface $factory,
        UserViews $readRepository
    ) {
        $this->repository = $repository;
        $this->factory = $factory;
        $this->readRepository = $readRepository;
        parent::__construct($serializer);
    }

    public function __invoke(RegisterUserRequest $request): Response
    {
        $user = $this->factory->fromDTO($request);
        $this->repository->add($user);

        // @TODO not in the interface?
        return $this->createApiResponse(
            $this->readRepository->get($user->id()),
            Response::HTTP_CREATED
        );
    }
}