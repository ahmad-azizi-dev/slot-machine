<?php

namespace App\SlotMachine;

class Board
{
    private $rows;
    private $columns;
    public $symbols = ['9', '10', 'J', 'Q', 'K', 'A', 'cat', 'dog', 'monkey', 'bird'];
    private $lastKeySymbols;


    public function __construct($columns = 5, $rows = 3)
    {
        $this->columns = $columns;
        $this->rows = $rows;
        $this->lastKeySymbols = array_key_last($this->symbols);
    }


    /**
     * @return array
     * example[
     *            0 => 'J',    3 => 'J',    6 => 'J',  9 => 'Q',       12 => 'K',
     *            1 => 'cat',  4 => 'J',    7 => 'Q',  10 => 'monkey', 13 => 'bird',
     *            2 => 'bird', 5 => 'bird', 8 => 'J',  11 => 'Q',      14 => 'A'
     *        ];
     */
    public function generate(): array
    {
        $board = [];
        for ($i = 0; $i < $this->rows; $i++) {
            for ($j = $i; $j < ($this->columns * $this->rows); $j += $this->rows) {
                $board[$j] = RandomSymbol::run($this->symbols, $j, $this->lastKeySymbols);
            }
        }

        return $board;
    }
}