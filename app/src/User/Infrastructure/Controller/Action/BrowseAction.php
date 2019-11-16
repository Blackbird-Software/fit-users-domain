<?php
declare(strict_types=1);

namespace App\User\Infrastructure\Controller\Action;

use App\Shared\Infrastructure\Controller\Action\AbstractAction;
use App\User\Infrastructure\View\Repository\UserViews;
use JMS\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class BrowseAction extends AbstractAction
{
    private UserViews $repository;

    public function __construct(SerializerInterface $serializer, UserViews $repository)
    {
        $this->repository = $repository;
        parent::__construct($serializer);
    }

    public function __invoke(Request $request): Response
    {
        $params = $request->query->all();

        return $this->createApiResponse($this->repository->getPaginatedCollection($params));
    }
}