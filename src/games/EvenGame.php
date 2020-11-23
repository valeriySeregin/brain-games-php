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

function generateQuestionAndAnswer()
{
    $question = rand(0, 1000);
    $answer = isEven($question) ? 'yes' : 'no';

    return [$question, $answer];
}
