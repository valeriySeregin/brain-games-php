<?php

namespace Php\Brain\Games\Cli;

use function cli\line;
use function cli\prompt;

function run()
{
    line('Welcome to the Brain Games!');
    $userName = prompt('May I have your name?');
    line("Hello, %s!", $userName);
}
