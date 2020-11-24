<?php

namespace BrainGames\Games\EvenGame;

use function BrainGames\GameEngine\startGame;

const GAME_RULE = 'Answer \'yes\' if given number is even and \'no\' otherwise' . PHP_EOL;

function start()
{
    return startGame(GAME_RULE, fn() => generateQuestionAndAnswer());
}

function isEven($num)
{
    return $num % 2 === 0;
}

function generateQuestionAndAnswer()
{
    $question = rand(0, 1000);
    $answer = isEven($question) ? 'yes' : 'no';

    return [$question, $answer];
}
