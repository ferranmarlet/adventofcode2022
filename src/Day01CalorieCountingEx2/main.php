<?php

declare(strict_types=1);

namespace Kata\Day01CalorieCountingEx2;

require __DIR__ . '/../../vendor/autoload.php';

$calorieCounter = new CalorieCounter();

echo $calorieCounter->findCaloriesOfThreeMostPackedElves(input::$data) . "\r\n";

