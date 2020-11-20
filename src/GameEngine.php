<?php

namespace BrainGames\GameEngine;

use function cli\line;
use function cli\prompt;

function startGame($gameData, $roundsCount = 3)
{
    line('Welcome to the Brain Games!');
    $gameData['gameRules']();
    $playerName = prompt('May I have your name?', false, ' ');
    line("Hello, %s!" . PHP_EOL, $playerName);

    $rounds = 0;

    while ($rounds < $roundsCount) {
        $question = $gameData['question']();
        line("Question: {$question}");

        $userAnswer = prompt('Your answer');
        $correctAnswer = $gameData['correctAnswer']($question);

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
