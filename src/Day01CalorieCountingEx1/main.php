<?php

declare(strict_types=1);

namespace Kata\Day01CalorieCountingEx1;

require __DIR__ . '/../../vendor/autoload.php';

$calorieCounter = new CalorieCounter();

echo $calorieCounter->findCaloriesOfElfWithMoreCalories(input::$data) . "\r\n";

