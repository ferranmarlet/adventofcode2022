<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;
use Kata\Day01CalorieCountingEx2\CalorieCounter;

class CalorieCounterEx2Test extends TestCase
{
    /**
     * @test
     */
    public function shoud_count_calories_for_only_three_elfs(): void
    {
        $counter = new CalorieCounter();
        $result = $counter->findCaloriesOfThreeMostPackedElves([1000, '', 1000, '', 1000]);
        self::assertEquals(3000, $result);
    }

    /**
     * @test
     */
    public function should_sum_snack_calories_of_multiple_elves(): void
    {
        $counter = new CalorieCounter();
        $result = $counter->findCaloriesOfThreeMostPackedElves([
            '1000',
            '2000',
            '3000',
            '',
            '4000',
            '',
            '5000',
            '6000',
            '',
            '7000',
            '8000',
            '9000',
            '',
            '10000'
        ]);
        self::assertEquals(45000, $result);
    }
}
