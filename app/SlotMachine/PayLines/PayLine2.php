<?php

namespace App\SlotMachine\PayLines;

class PayLine2 extends PayLine
{

    public function line(): array
    {
        return [0, 3, 6, 9, 12];
    }

}