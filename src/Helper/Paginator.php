<?php


namespace App\Helper;


class Paginator
{
    const ITEMS_PER_PAGE = 5;

    private $page = 0;
    private $total = 0;

    public function __construct(int $page, int $total)
    {
        $this->page = $page;
        $this->total = $total;
    }

    public function getPage(): int
    {
        return $this->page;
    }

    public function getTotal(): int
    {
        return $this->total;
    }

    /**
     * @param int $i zero based
     * @return bool
     */
    public function isInPage(int $i): bool
    {
        return $i >= ($this->page - 1) * self::ITEMS_PER_PAGE && $i < $this->page * self::ITEMS_PER_PAGE;
    }
}