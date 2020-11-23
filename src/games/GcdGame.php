<?php

namespace BrainGames\Games\GcdGame;

use function cli\line;

function calculateGcd($firstNum, $secondNum)
{
    return $firstNum % $secondNum === 0 ? $secondNum : calculateGcd($secondNum, $firstNum % $secondNum);
}

function getGameRules()
{
    return line('Find the greates common divisor of given numbers' . PHP_EOL);
}

function generateQuestionAndAnswer()
{
    $firstNumber = rand(1, 100);
    $secondNumber = rand(1, 100);

    $question = "{$firstNumber} {$secondNumber}";
    $answer = calculateGcd($firstNumber, $secondNumber);

    return [$question, (string) $answer];
}
