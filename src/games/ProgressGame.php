<?php

namespace BrainGames\Games\ProgressGame;

use function cli\line;

const PROGRESSION_LENGTH = 9;

function getGameRules()
{
    return line('What number is missing in the progression?' . PHP_EOL);
}

function getQuestion()
{
    $step = rand(1, 10);
    $indexToMiss = rand(0, PROGRESSION_LENGTH - 1);
    $firstElement = rand(0, 100);
    $lastElement = $firstElement + $step * PROGRESSION_LENGTH - 1;
    $progressionElements = range($firstElement, $lastElement, $step);
    $progressionElements[$indexToMiss] = '..';
    $progression = implode(' ', $progressionElements);

    return $progression;
}

function getCorrectAnswer($progression)
{
    $progressionElements = explode(' ', $progression);
    $missingNumberIndex = array_search('..', $progressionElements);

    if ($progressionElements[0] !== '..' && $progressionElements[1] !== '..') {
        $progressionStep = $progressionElements[1] - $progressionElements[0];
    } else {
        $progressionStep = $progressionElements[3] - $progressionElements[2];
    }

    if ($missingNumberIndex > 0) {
        $correctAnswer = $progressionElements[$missingNumberIndex - 1] + $progressionStep;
    } else {
        $correctAnswer = $progressionElements[$missingNumberIndex + 1] - $progressionStep;
    }

    return (string)$correctAnswer;
}
