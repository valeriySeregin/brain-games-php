<?php

namespace BrainGames\Games\CalcGame;

use function cli\line;

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

function getGameRules()
{
    return line('What is the result of the expression?' . PHP_EOL);
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
