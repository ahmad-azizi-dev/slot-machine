<?php

namespace App\SlotMachine\PayLines;

class PayLine4 extends PayLine
{

    public function line(): array
    {
        return [0, 4, 8, 10, 12];
    }

}