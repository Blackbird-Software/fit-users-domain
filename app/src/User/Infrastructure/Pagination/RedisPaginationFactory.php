<?php

declare(strict_types=1);

namespace App\User\Infrastructure\Pagination;

use App\Common\Infrastructure\Pagination\PaginatedCollection;
use App\Common\Infrastructure\Pagination\PaginatedCollectionInterface;
use App\Common\Infrastructure\Pagination\PaginationFactory;
use Pagerfanta\Adapter\ArrayAdapter;
use Pagerfanta\Pagerfanta;
use Symfony\Component\Routing\RouterInterface;

final class RedisPaginationFactory implements PaginationFactory
{
    public const DEFAULT_PER_PAGE = 25;

    public const DEFAULT_PAGE = 1;

    private RouterInterface $router;

    public function __construct(RouterInterface $router)
    {
        $this->router = $router;
    }

    public function createCollection($source, array $params, string $route, array $routeParams = []): PaginatedCollectionInterface
    {
        $page = $params['page'] ?? self::DEFAULT_PAGE;
        $perPage = $params['per_page'] ?? self::DEFAULT_PER_PAGE;

        $adapter = new ArrayAdapter($source);
        $pagerfanta = new Pagerfanta($adapter);

        $pagerfanta->setMaxPerPage($perPage);
        $pagerfanta->setCurrentPage($page);

        $paginatedCollection = new PaginatedCollection(
            new \ArrayIterator($pagerfanta->getCurrentPageResults()),
            $pagerfanta->getNbResults()
        );

        $routeParams = array_merge($routeParams, $params);

        $createLinkUrl = function ($targetPage) use ($route, $routeParams) {
            return $this->router->generate($route, array_merge(
                $routeParams,
                ['page' => $targetPage]
            ));
        };

        // @TODO change to decorator?
        $paginatedCollection->addLink('self', $createLinkUrl($page));
        $paginatedCollection->addLink('first', $createLinkUrl(1));
        $paginatedCollection->addLink('last', $createLinkUrl($pagerfanta->getNbPages()));

        if ($pagerfanta->hasNextPage()) {
            $paginatedCollection->addLink('next', $createLinkUrl($pagerfanta->getNextPage()));
        }

        if ($pagerfanta->hasPreviousPage()) {
            $paginatedCollection->addLink('prev', $createLinkUrl($pagerfanta->getPreviousPage()));
        }

        return $paginatedCollection;
    }
}