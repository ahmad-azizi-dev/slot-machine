<?php

namespace App\Console\Commands;

use App\SlotMachine\Board;
use App\SlotMachine\Machine;
use Illuminate\Console\Command;

class SlotMachine extends Command
{

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'slot:spin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Small part of a simulated slot machine.";

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'slot:spin {bet_amount?}';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $betAmount = $this->argument('bet_amount') ?? 100;
        $board = (new Board())->generate();
        $machine = new Machine($betAmount);

        $this->info($machine->run($board)->consoleEncode());
    }


}