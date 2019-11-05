<?php

namespace App\Tests\Model;

use App\Model\ViewingWindowModel;
use PHPUnit\Framework\TestCase;

class ViewingWindowModelTest extends TestCase
{
    public function testCreateSuccess(){
        $data = [
            'title' => 'My title',
            'startDate' => 'Start Date',
            'wayToWatch' => 'Way To Watch',
            'endDate' => 'End Date'
        ];
        $viewingWindow = new ViewingWindowModel($data);

        $this->assertEquals('My title', $viewingWindow->title);
        $this->assertEquals('Start Date', $viewingWindow->startDate);
        $this->assertEquals('End Date', $viewingWindow->endDate);
        $this->assertEquals('Way To Watch', $viewingWindow->wayToWatch);
    }

    public function testAccessFail(){
        $data = [
            'startDate' => 'Start Date',
            'wayToWatch' => 'Way To Watch',
            'endDate' => 'End Date'
        ];
        $viewingWindow = new ViewingWindowModel($data);
        $this->assertEquals(null, $viewingWindow->title);

        $this->expectException(\InvalidArgumentException::class);
        $viewingWindow->other;
    }
}
