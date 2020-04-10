<?php declare(strict_types=1);

namespace App\Common\Infrastructure\Pagination;

interface PaginationFactory
{
    public function createCollection($source, array $params, string $route, array $routeParams = []): PaginatedCollectionInterface;
}
