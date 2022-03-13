<?php


use App\SlotMachine\Machine;

class SlotMachineTest extends TestCase
{

    /**
     * @test
     * @dataProvider machineDataProvider
     */
    public function machineRun($betAmount, $board, $paylines, $totalWin)
    {
        $machine = new Machine($betAmount);
        $result = $machine->run($board)->getResult();
        $this->assertEquals($result['paylines'], $paylines);
        $this->assertEquals($result['total_win'], $totalWin);
    }

    public function machineDataProvider(): array
    {
        return array(
            [
                100, //  bet amount
                [
                    0 => 'J',    3 => 'J',    6 => 'J', 9 => 'Q',       12 => 'K',
                    1 => 'cat',  4 => 'J',    7 => 'Q', 10 => 'monkey', 13 => 'bird',
                    2 => 'bird', 5 => 'bird', 8 => 'J', 11 => 'Q',      14 => 'A'
                ],
                [
                    [
                        'line' => [0, 3, 6, 9, 12],   //payLine2
                        'countConsecutiveSymbols' => 3
                    ],
                    [
                        'line' => [0, 4, 8, 10, 12],  //payLine4
                        'countConsecutiveSymbols' => 3
                    ]
                ],
                40  // total win
            ],
//-------------------------------------------------------------------------------
            [
                100, //  bet amount
                [
                    0 => 'J',    3 => 'J',    6 => 'J', 9 => 'J',       12 => 'K',
                    1 => 'cat',  4 => 'J',    7 => 'Q', 10 => 'monkey', 13 => 'bird',
                    2 => 'bird', 5 => 'bird', 8 => 'J', 11 => 'Q',      14 => 'A'
                ],
                [
                    [
                        'line' => [0, 3, 6, 9, 12],   //payLine2
                        'countConsecutiveSymbols' => 4
                    ],
                    [
                        'line' => [0, 4, 8, 10, 12],  //payLine4
                        'countConsecutiveSymbols' => 3
                    ]
                ],
                220  // total win
            ],
//-------------------------------------------------------------------------------
            [
                1000, //  bet amount
                [
                    0 => 'J',    3 => 'J',    6 => 'J',    9 => 'J',       12 => 'K',
                    1 => 'cat',  4 => 'J',    7 => 'Q',    10 => 'monkey', 13 => 'bird',
                    2 => 'bird', 5 => 'bird', 8 => 'bird', 11 => 'Q',      14 => 'A'
                ],
                [
                    [
                        'line' => [0, 3, 6, 9, 12],   //payLine2
                        'countConsecutiveSymbols' => 4
                    ],
                    [
                        'line' => [2, 5, 8, 11, 14],  //payLine3
                        'countConsecutiveSymbols' => 3
                    ]
                ],
                2200  // total win
            ],
//-------------------------------------------------------------------------------
            [
                100, //  bet amount
                [
                    0 => 'K',    3 => 'J',    6 => 'J', 9 => 'J',       12 => 'K',
                    1 => 'cat',  4 => 'J',    7 => 'Q', 10 => 'monkey', 13 => 'bird',
                    2 => 'bird', 5 => 'bird', 8 => 'Q', 11 => 'Q',      14 => 'A'
                ],
                [],
                0  // total win
            ],
//-------------------------------------------------------------------------------
            [
                100, //  bet amount
                [
                    0 => 'J',   3 => 'J',  6 => 'A',    9 => 'J',  12 => 'K',
                    1 => 'cat', 4 => 'A',  7 => 'Q',    10 => 'A', 13 => 'bird',
                    2 => 'A',   5 => '10', 8 => 'bird', 11 => 'Q', 14 => 'A'
                ],
                [
                    [
                        'line' => [2, 4, 6, 10, 14],  //payLine5
                        'countConsecutiveSymbols' => 5
                    ],
                ],
                1000  // total win
            ],
//-------------------------------------------------------------------------------
            [
                100, //  bet amount
                [
                    0 => 'bird', 3 => 'J',    6 => 'A',    9 => 'J',     12 => 'bird',
                    1 => 'cat',  4 => 'bird', 7 => 'Q',    10 => 'bird', 13 => 'bird',
                    2 => 'A',    5 => '10',   8 => 'bird', 11 => 'Q',    14 => 'A'
                ],
                [
                    [
                        'line' => [0, 4, 8, 10, 12],  //payLine4
                        'countConsecutiveSymbols' => 5
                    ],
                ],
                1000  // total win
            ],
//-------------------------------------------------------------------------------
            [
                100, //  bet amount
                [
                    0 => 'J', 3 => 'J',  6 => 'A',    9 => 'J',  12 => 'K',
                    1 => 'Q', 4 => 'Q',  7 => 'Q',    10 => 'Q', 13 => 'Q',
                    2 => 'A', 5 => '10', 8 => 'bird', 11 => 'Q', 14 => 'A'
                ],
                [
                    [
                        'line' => [1, 4, 7, 10, 13],  //payLine1
                        'countConsecutiveSymbols' => 5
                    ],
                ],
                1000  // total win
            ],
//-------------------------------------------------------------------------------
            [
                100, //  bet amount
                [
                    0 => 'monkey', 3 => 'monkey', 6 => 'K',    9 => 'J',       12 => 'K',
                    1 => 'K',      4 => 'K',      7 => 'K',    10 => 'monkey', 13 => 'bird',
                    2 => 'K',      5 => 'bird',   8 => 'bird', 11 => 'Q',      14 => 'A'
                ],
                [
                    [
                        'line' => [1, 4, 7, 10, 13],  //payLine2
                        'countConsecutiveSymbols' => 3
                    ],
                    [
                        'line' => [2, 4, 6, 10, 14],  //payLine5
                        'countConsecutiveSymbols' => 3
                    ]
                ],
                40  // total win
            ],
        );
    }
}
