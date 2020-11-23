<?php

namespace BrainGames\Games\PrimeGame;

use function cli\line;

const PROGRESSION_LENGTH = 9;

function getGameRules()
{
    return line('Answer \'yes\' if given number is prime. Otherwise answer \'no\'' . PHP_EOL);
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
