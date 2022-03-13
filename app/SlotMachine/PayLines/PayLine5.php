<?php

namespace App\SlotMachine\PayLines;

class PayLine5 extends PayLine
{

    public function line(): array
    {
        return [2, 4, 6, 10, 14];
    }

}