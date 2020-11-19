<?php

namespace Php\Brain\Games\Even;

use function cli\line;
use function cli\prompt;

function isEven($num)
{
    return $num % 2 === 0;
}

function getIsEvenGame($roundsCount = 3)
{
    line('Welcome to the Brain Games!');
    line('Answer \'yes\' if given number is even and \'no\' otherwise' . PHP_EOL);
    $playerName = prompt('May I have your name?', false, ' ');
    line("Hello, %s!" . PHP_EOL, $playerName);

    $rounds = 0;

    while ($rounds < $roundsCount) {
        $randomNum = rand(0, 1000);
        line("Question: {$randomNum}");

        $userAnswer = prompt('Your answer');
        $correctAnswer = isEven($randomNum) ? 'yes' : 'no';

        if ($userAnswer === $correctAnswer) {
            line('Correct!');
            $rounds += 1;
        } else {
            line("'{$userAnswer}' is wrong answer. Correct answer was '{$correctAnswer}'.");
            line('Let\'s try again, %s!', $playerName);
            return;
        }
    }

    line('Congratulations, %s!', $playerName);
}
