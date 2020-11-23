<?php

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;
use function BrainGames\GameEngine\startGame;

function start()
{
    line('Welcome to the Brain Games!');
    line('Please, enter the number of the game you want to play.' . PHP_EOL);
    getAvailableGamesList();
    $choice = prompt('Your choice:', false, ' ');
    $gameName = getGameName($choice);

    return startGame($gameName);
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

function getGameName($num)
{
    $gameNames = [
        1 => 'calc',
        2 => 'even',
        3 => 'gcd',
        4 => 'prime',
        5 => 'progress'
    ];

    return $gameNames[$num - 1];
}
