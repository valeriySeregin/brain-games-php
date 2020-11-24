<?php

namespace BrainGames\GameEngine;

use function cli\line;
use function cli\prompt;

const GAME_ROUNDS_COUNT = 3;

function startGame($gameRule, $getQuestionAndAnswer)
{
    line($gameRule);
    $playerName = prompt('May I have your name?', false, ' ');
    line("Hello, %s!" . PHP_EOL, $playerName);

    for ($rounds = 0; $rounds < GAME_ROUNDS_COUNT; $rounds += 1) {
        [$question, $answer] = $getQuestionAndAnswer();
        line("Question: {$question}");

        $userAnswer = prompt('Your answer');

        if ($userAnswer !== $answer) {
            line("'{$userAnswer}' is wrong answer. Correct answer was '{$answer}'.");
            line('Let\'s try again, %s!', $playerName);
            return;
        }

        line('Correct!');
    }

    line('Congratulations, %s!', $playerName);
}
