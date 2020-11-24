<?php

namespace BrainGames\Games\PrimeGame;

use function BrainGames\GameEngine\startGame;

const GAME_RULE = 'Answer \'yes\' if given number is prime. Otherwise answer \'no\'' . PHP_EOL;

function start()
{
    return startGame(GAME_RULE, fn() => generateQuestionAndAnswer());
}

function isPrime($num)
{
    if ($num === 1) {
        return false;
    }

    $divisibilityLimit = $num / 2;

    for ($i = 2; $i <= $divisibilityLimit; $i += 1) {
        if ($num % $i === 0) {
            return false;
        }
    }

    return true;
}

function generateQuestionAndAnswer()
{
    $question = rand(1, 99);
    $answer = isPrime($question) ? 'yes' : 'no';

    return [$question, (string) $answer];
}
