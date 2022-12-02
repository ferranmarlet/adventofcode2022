<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;
use Kata\Day01CalorieCountingEx1\CalorieCounter;

class CalorieCounterEx1Test extends TestCase
{
    /**
     * @test
     */
    public function shoud_return_zero_for_empty_list(): void
    {
        $counter = new CalorieCounter();
        self::assertEquals(0, $counter->findCaloriesOfElfWithMoreCalories([]));
    }

    /**
     * @test
     */
    public function shoud_count_calories_for_one_elf_and_one_snack(): void
    {
        $counter = new CalorieCounter();
        $result = $counter->findCaloriesOfElfWithMoreCalories([1000]);
        self::assertEquals(1000, $result);
    }

    /**
     * @test
     */
    public function shoud_sum_snack_calories_for_one_elf(): void
    {
        $counter = new CalorieCounter();
        $result = $counter->findCaloriesOfElfWithMoreCalories([1000, 2000, 3000]);
        self::assertEquals(6000, $result);
    }

    /**
     * @test
     */
    public function should_sum_snack_calories_of_multiple_elves(): void
    {
        $counter = new CalorieCounter();
        $result = $counter->findCaloriesOfElfWithMoreCalories([
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
        self::assertEquals(24000, $result);
    }
}
