<?php

namespace App\SlotMachine\PayLines;

abstract class PayLine
{

    protected $board;


    public function __construct(array $board)
    {
        $this->board = $board;
    }

    abstract public function line(): array;


    /**
     * calculate the number of consecutive symbols for each pay line.
     */
    public function calculateMatched(): array
    {
        $lineSymbol = $this->lineSymbol();

        $firstSymbol = array_shift($lineSymbol);
        $consecutiveSymbols = 1;

        foreach ($lineSymbol as $symbol) {
            if ($firstSymbol != $symbol) {
                break;
            }
            $consecutiveSymbols++;
        }

        return ['line' => $this->line(), 'countConsecutiveSymbols' => $consecutiveSymbols];
    }


    /**
     * provide array of symbols base on defined pay line.
     */
    public function lineSymbol(): array
    {
        return array_map(function ($key) {
            return $this->board[$key];
        }, $this->line());
    }

}