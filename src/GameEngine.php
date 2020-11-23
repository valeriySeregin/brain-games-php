<?php

namespace BrainGames\GameEngine;

use function cli\line;
use function cli\prompt;

const GAME_ROUNDS_COUNT = 3;

function getGameRules($title)
{
    $rules = [
        'even' => fn() => \BrainGames\Games\EvenGame\getGameRules(),
        'calc' => fn() => \BrainGames\Games\CalcGame\getGameRules(),
        'gcd' => fn() => \BrainGames\Games\GcdGame\getGameRules(),
        'progress' => fn() => \BrainGames\Games\ProgressGame\getGameRules()
    ];

    return $rules[$title];
}

function getQuestion($title)
{
    $questions = [
        'even' => fn() => \BrainGames\Games\EvenGame\getQuestion(),
        'calc' => fn() => \BrainGames\Games\CalcGame\getQuestion(),
        'gcd' => fn() => \BrainGames\Games\GcdGame\getQuestion(),
        'progress' => fn() => \BrainGames\Games\ProgressGame\getQuestion()
    ];

    return $questions[$title];
}

function getCorrectAnswer($title)
{
    $answers = [
        'even' => fn($question) => \BrainGames\Games\EvenGame\getCorrectAnswer($question),
        'calc' => fn($question) => \BrainGames\Games\CalcGame\getCorrectAnswer($question),
        'gcd' => fn($question) => \BrainGames\Games\GcdGame\getCorrectAnswer($question),
        'progress' => fn($question) => \BrainGames\Games\ProgressGame\getCorrectAnswer($question)
    ];

    return $answers[$title];
}

function startGame($gameTitle = null)
{
    line('Welcome to the Brain Games!');
    $title = $gameTitle ?? prompt('What game do you want to play?', false, ' ');

    getGameRules($title)();
    $playerName = prompt('May I have your name?', false, ' ');
    line("Hello, %s!" . PHP_EOL, $playerName);

    $rounds = 0;

    while ($rounds < GAME_ROUNDS_COUNT) {
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
