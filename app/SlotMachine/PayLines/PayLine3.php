<?php

namespace App\SlotMachine\PayLines;

class PayLine3 extends PayLine
{

    public function line(): array
    {
        return [2, 5, 8, 11, 14];
    }

}