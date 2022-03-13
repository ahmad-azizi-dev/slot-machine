<?php

namespace App\SlotMachine;

/**
 *  this generates random symbols depend on defined win rate.
 */
class RandomSymbol
{
    private static $firstRand;
    private static $winRate = 8;  // define the chance of total win  {0 - 14}

    public static function run(array $symbols, int $key, int $lastKeySymbols)
    {
        if ($key == 0) {
            self::$firstRand = rand(0, $lastKeySymbols);
            return $symbols[self::$firstRand];
        }

        if ($key <= self::$winRate) {
            if (self::$firstRand > 0) {
                return $symbols[self::$firstRand - rand(0, 1)];
            } elseif (self::$firstRand < $lastKeySymbols) {
                return $symbols[self::$firstRand + rand(0, 1)];
            }
        }
        return $symbols[rand(0, $lastKeySymbols)];
    }

}