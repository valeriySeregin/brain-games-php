<?php

namespace BrainGames\Games\GcdGame;

use function cli\line;
use function BrainGames\GameEngine\startGame;

const GAME_RULE = 'Find the greates common divisor of given numbers' . PHP_EOL;

function start()
{
    return startGame(GAME_RULE, fn() => generateQuestionAndAnswer());
}

function calculateGcd($firstNum, $secondNum)
{
    return $firstNum % $secondNum === 0 ? $secondNum : calculateGcd($secondNum, $firstNum % $secondNum);
}

function generateQuestionAndAnswer()
{
    $firstNumber = rand(1, 100);
    $secondNumber = rand(1, 100);

    $question = "{$firstNumber} {$secondNumber}";
    $answer = calculateGcd($firstNumber, $secondNumber);

    return [$question, (string) $answer];
}
