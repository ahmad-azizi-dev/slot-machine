<?php

use App\SlotMachine\Board;

class BoardTest extends TestCase
{
    /**
     * @test
     */
    public function boardGenerate()
    {
        $board = new Board();
        $generatedBoard = $board->generate();

        $this->assertTrue(is_array($generatedBoard));
        $this->assertCount(15, $generatedBoard);
        $this->assertEquals([0, 3, 6, 9, 12, 1, 4, 7, 10, 13, 2, 5, 8, 11, 14], array_keys($generatedBoard));
        $this->assertCount(0, array_diff($generatedBoard, $board->symbols));
    }
}