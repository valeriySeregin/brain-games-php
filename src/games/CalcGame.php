<?php

namespace BrainGames\Games\CalcGame;

use function cli\line;
use function BrainGames\GameEngine\startGame;

const GAME_RULE = 'What is the result of the expression?' . PHP_EOL;

function start()
{
    return startGame(GAME_RULE, fn() => generateQuestionAndAnswer());
}

function getRandomOperator()
{
    $operators = ['+', '-', '*'];

    return $operators[rand(0, 2)];
}

function calculateExpressionResult($firstOperand, $operator, $secondOperand)
{
    switch ($operator) {
        case '+':
            return $firstOperand + $secondOperand;
        case '-':
            return $firstOperand - $secondOperand;
        case '*':
            return $firstOperand * $secondOperand;
        default:
            return 'Unexpected operator!';
    }
}

function generateQuestionAndAnswer()
{
    $firstOperand = rand(0, 10);
    $secondOperand = rand(0, 10);
    $operator = getRandomOperator();

    $question = "{$firstOperand} {$operator} {$secondOperand}";
    $answer = calculateExpressionResult($firstOperand, $operator, $secondOperand);
    ;

    return [$question, (string) $answer];
}
