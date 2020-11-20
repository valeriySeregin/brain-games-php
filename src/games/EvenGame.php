<?php

namespace BrainGames\Games\EvenGame;

use function cli\line;

function isEven($num)
{
    return $num % 2 === 0;
}

function getGameRules()
{
    return line('Answer \'yes\' if given number is even and \'no\' otherwise' . PHP_EOL);
}

function getQuestion()
{
    return rand(0, 1000);
}

function getCorrectAnswer($num)
{
    return isEven($num) ? 'yes' : 'no';
}
