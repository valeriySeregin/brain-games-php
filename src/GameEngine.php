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
        'progress' => fn() => \BrainGames\Games\ProgressGame\getGameRules(),
        'prime' => fn() => \BrainGames\Games\PrimeGame\getGameRules()
    ];

    return $rules[$title];
}

function getQuestionAndAnswer($title)
{
    $questionsAndAnswers = [
        'even' => fn() => \BrainGames\Games\EvenGame\generateQuestionAndAnswer(),
        'calc' => fn() => \BrainGames\Games\CalcGame\generateQuestionAndAnswer(),
        'gcd' => fn() => \BrainGames\Games\GcdGame\generateQuestionAndAnswer(),
        'progress' => fn() => \BrainGames\Games\ProgressGame\generateQuestionAndAnswer(),
        'prime' => fn() => \BrainGames\Games\PrimeGame\generateQuestionAndAnswer()
    ];

    return $questionsAndAnswers[$title];
}

function startGame($gameTitle)
{
    getGameRules($gameTitle)();
    $playerName = prompt('May I have your name?', false, ' ');
    line("Hello, %s!" . PHP_EOL, $playerName);

    $rounds = 0;

    while ($rounds < GAME_ROUNDS_COUNT) {
        [$question, $answer] = getQuestionAndAnswer($gameTitle)();
        line("Question: {$question}");

        $userAnswer = prompt('Your answer');

        if ($userAnswer === $answer) {
            line('Correct!');
            $rounds += 1;
        } else {
            line("'{$userAnswer}' is wrong answer. Correct answer was '{$answer}'.");
            line('Let\'s try again, %s!', $playerName);
            return;
        }
    }

    line('Congratulations, %s!', $playerName);
}
