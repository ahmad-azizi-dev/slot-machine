<?php

namespace App\SlotMachine\PayLines;

class PayLine1 extends PayLine
{

    public function line(): array
    {
        return [1, 4, 7, 10, 13];
    }

}