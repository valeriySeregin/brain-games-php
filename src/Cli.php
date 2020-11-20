<?php

namespace BrainGames\Cli;

use function BrainGames\GameEngine\startGame;
use function BrainGames\Games\EvenGame\{getGameRules, getQuestion, getCorrectAnswer};

function run()
{
    $gameData = [
        'gameRules' => fn() => getGameRules(),
        'question' => fn() => getQuestion(),
        'correctAnswer' => fn($question) => getCorrectAnswer($question)
    ];

    return startGame($gameData);
}
