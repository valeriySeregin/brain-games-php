<?php

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;
use function BrainGames\GameEngine\startGame;
use function BrainGames\Games\CalcGame\start as startCalc;
use function BrainGames\Games\EvenGame\start as startEven;
use function BrainGames\Games\GcdGame\start as startGcd;
use function BrainGames\Games\PrimeGame\start as startPrime;
use function BrainGames\Games\ProgressGame\start as startProgress;

function start()
{
    line('Welcome to the Brain Games!');
    line('Please, enter the number of the game you want to play.' . PHP_EOL);
    getAvailableGamesList();
    $choice = prompt('Your choice:', false, ' ');
    $game = getGame($choice);

    return $game();
}

function getAvailableGamesList()
{
    $availableGames = [
        '1 - Even number',
        '2 - Calculate math expression',
        '3 - Find GCD',
        '4 - Prime number',
        '5 - Find missing progression number'
    ];

    return line(implode("\n", $availableGames) . PHP_EOL);
}

function getGame($num)
{
    $gameNames = [
        1 => fn() => startEven(),
        2 => fn() => startCalc(),
        3 => fn() => startGcd(),
        4 => fn() => startPrime(),
        5 => fn() => startProgress()
    ];

    if (!array_key_exists($num, $gameNames)) {
        throw new \Exception('No such game! Try run app again.');
    }

    return $gameNames[$num];
}
