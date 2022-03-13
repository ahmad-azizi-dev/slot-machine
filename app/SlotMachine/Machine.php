<?php

namespace App\SlotMachine;

use App\SlotMachine\PayLines\{PayLine, PayLine1, PayLine2, PayLine3, PayLine4, PayLine5};


class Machine
{
    private $betAmount;

    private $payoutRules = [
        3 => 0.2,  //  pay 20%
        4 => 2,    //  pay 200%
        5 => 10    //  pay 1000%
    ];

    private $payLines = [
        PayLine1::class,
        PayLine2::class,
        PayLine3::class,
        PayLine4::class,
        PayLine5::class
    ];

    private $result = [];

    public function __construct(int $betAmount = 100)
    {
        $this->betAmount = $betAmount;
    }


    /**
     *  run all necessary functions.
     */
    public function run(array $board): Machine
    {
        $payOut = 0;
        $payLinesResult = [];
        foreach ($this->payLines as $payLine) {
            $matched = $this->instantiatePayLine($payLine, $board)->calculateMatched();
            list($payOut, $payLinesResult) = $this->getPay($matched, $payOut, $payLinesResult);
        }
        $this->formatResult($board, $payLinesResult, $payOut);

        return $this;
    }


    public function instantiatePayLine(string $payLine, array $board): PayLine
    {
        return new $payLine($board);
    }


    /**
     *  calculate the total win.
     */
    public function getPay(array $matched, $payOut, array $payLinesResult): array
    {
        if ($matched['countConsecutiveSymbols'] >= 3) {
            $payOut += $this->calculatePayout($matched['countConsecutiveSymbols']);
            $payLinesResult[] = $matched;
        }
        return [$payOut, $payLinesResult];
    }


    public function calculatePayout($matched)
    {
        return $this->betAmount * $this->payoutRules[$matched];
    }


    public function formatResult(array $board, $payLinesResult, $payOut): void
    {
        $this->result = ['board' => $board, 'paylines' => $payLinesResult, 'bet_amount' => $this->betAmount, 'total_win' => $payOut];
    }


    public function getResult(): array
    {
        return $this->result;
    }

    public function consoleEncode(): string
    {
        return ConsoleFormatter::get($this->result);
    }


}