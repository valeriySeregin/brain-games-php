<?php

namespace BrainGames\GameEngine;

use function cli\line;
use function cli\prompt;

function getGameRules($title)
{
    $rules = [
        'even' => fn() => \BrainGames\Games\EvenGame\getGameRules(),
        'calc' => fn() => \BrainGames\Games\CalcGame\getGameRules(),
    ];

    return $rules[$title];
}

function getQuestion($title)
{
    $questions = [
        'even' => fn() => \BrainGames\Games\EvenGame\getQuestion(),
        'calc' => fn() => \BrainGames\Games\CalcGame\getQuestion(),
    ];

    return $questions[$title];
}

function getCorrectAnswer($title)
{
    $answers = [
        'even' => fn($question) => \BrainGames\Games\EvenGame\getCorrectAnswer($question),
        'calc' => fn($question) => \BrainGames\Games\CalcGame\getCorrectAnswer($question),
    ];

    return $answers[$title];
}

function startGame($roundsCount = 3)
{
    line('Welcome to the Brain Games!');
    $title = prompt('What game do you want to play?');

    getGameRules($title)();
    $playerName = prompt('May I have your name?', false, ' ');
    line("Hello, %s!" . PHP_EOL, $playerName);

    $rounds = 0;

    while ($rounds < $roundsCount) {
        $question = getQuestion($title)();
        line("Question: {$question}");

        $userAnswer = prompt('Your answer');
        $correctAnswer = getCorrectAnswer($title)($question);

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
