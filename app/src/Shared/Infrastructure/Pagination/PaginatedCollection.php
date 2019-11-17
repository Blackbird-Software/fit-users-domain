<?php
declare(strict_types=1);

namespace App\Shared\Infrastructure\Pagination;

final class PaginatedCollection implements PaginatedCollectionInterface
{
    private array $items;

    private int $total;

    private int $count;

    private array $_links = [];

    public function __construct(\Traversable $items, int $totalItems)
    {
        $this->items = iterator_to_array($items);
        $this->total = $totalItems;
        $this->count = count($items);
    }

    public function addLink(string $ref, string $url): void
    {
        $this->_links[$ref] = $url;
    }

    public function getCount(): int
    {
        return $this->count;
    }

    public function getItems(): array
    {
        return $this->items;
    }
}
