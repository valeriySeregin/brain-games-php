<?php

namespace BrainGames\Games\ProgressGame;

use function cli\line;

const PROGRESSION_LENGTH = 9;

function getGameRules()
{
    return line('What number is missing in the progression?' . PHP_EOL);
}

function generateQuestionAndAnswer()
{
    $step = rand(1, 10);
    $indexToMiss = rand(0, PROGRESSION_LENGTH - 1);
    $firstElement = rand(0, 100);
    $lastElement = $firstElement + $step * PROGRESSION_LENGTH - 1;
    $progressionElements = range($firstElement, $lastElement, $step);

    $answer = $progressionElements[$indexToMiss];

    $progressionElements[$indexToMiss] = '..';

    $question = implode(' ', $progressionElements);

    return [$question, (string) $answer];
}
