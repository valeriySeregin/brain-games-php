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

function getQuestionAndAnswer($title)
{
    $questionsAndAnswers = [
        'even' => fn() => \BrainGames\Games\EvenGame\generateQuestionAndAnswer(),
        'calc' => fn() => \BrainGames\Games\CalcGame\generateQuestionAndAnswer(),
        'gcd' => fn() => \BrainGames\Games\GcdGame\generateQuestionAndAnswer(),
        'progress' => fn() => \BrainGames\Games\ProgressGame\generateQuestionAndAnswer()
    ];

    return $questionsAndAnswers[$title];
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
        [$question, $answer] = getQuestionAndAnswer($title)();
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
