<?php

namespace App\SlotMachine;

class ConsoleFormatter
{

    public static function getPaylines($payLinesResult): array
    {
        return array_map(function ($line) {
            $lineValues = array_values($line);
            return [implode(' ', $lineValues[0]) => $lineValues[1]];
        }, $payLinesResult);

    }

    public static function get(array $result): string
    {
        return json_encode(
            [
                'board' => array_values($result['board']),
                'paylines' => self::getPaylines($result['paylines']),
                'bet_amount' => $result['bet_amount'],
                'total_win' => $result['total_win']
            ], JSON_PRETTY_PRINT);
    }
}