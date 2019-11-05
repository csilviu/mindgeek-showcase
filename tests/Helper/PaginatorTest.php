<?php

namespace App\Tests\Helper;

use App\Helper\Paginator;
use PHPUnit\Framework\TestCase;

class PaginatorTest extends TestCase
{

    public function testGetPage()
    {
        $paginator = new Paginator(1, 10);
        $this->assertEquals(1, $paginator->getPage());
    }

    public function testIsInPage()
    {
        $paginator = new Paginator(1, 10);
        foreach(range(0, 4) as $i){
            $this->assertEquals(true, $paginator->isInPage($i));
        }
        $this->assertEquals(false, $paginator->isInPage(5));
    }

    public function testGetTotal()
    {
        $paginator = new Paginator(1, 10);
        $this->assertEquals(10, $paginator->getTotal());

    }
}
