<?php declare(strict_types=1);

namespace App\Common\Infrastructure\Pagination;

interface PaginatedCollectionInterface
{
    public function addLink(string $ref, string $url): void;

    public function getCount(): int;

    public function getItems(): array;
}
