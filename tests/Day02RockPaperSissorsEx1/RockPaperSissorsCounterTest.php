<?php

declare(strict_types=1);

namespace Tests;

use Kata\Day02RockPaperSissorsEx1\RockPaperSissorsCounter;
use PHPUnit\Framework\TestCase;

class RockPaperSissorsCounterTest extends TestCase
{
    /**
     * @test
     * @dataProvider losingHandsProvider
     */
    public function shoud_sum_points_when_losing($guide, $expectedPunctuation): void
    {
        self::assertEquals($expectedPunctuation, RockPaperSissorsCounter::getPointsFromGuide($guide));
    }

    /**
     * @test
     * @dataProvider drawHandsProvider
     */
    public function shoud_sum_points_when_draw($guide, $expectedPunctuation): void
    {
        self::assertEquals($expectedPunctuation, RockPaperSissorsCounter::getPointsFromGuide($guide));
    }

    /**
     * @test
     * @dataProvider winningHandsProvider
     */
    public function shoud_sum_points_when_winning($guide, $expectedPunctuation): void
    {
        self::assertEquals($expectedPunctuation, RockPaperSissorsCounter::getPointsFromGuide($guide));
    }

    /**
     * @test
     */
    public function should_sum_points_from_multiple_matches(): void
    {
        $guide = [
            'A Y',
            'B X',
            'C Z',
        ];

        self::assertEquals(15, RockPaperSissorsCounter::getPointsFromGuide($guide));
    }

    public function losingHandsProvider(): array
    {
        return [
            [
                ['A Z'], 3,
            ],
            [
                ['B X'], 1,
            ],
            [
                ['C Y'], 2,
            ],
        ];
    }

    public function drawHandsProvider(): array
    {
        return [
            [
                ['A X'], 4,
            ],
            [
                ['B Y'], 5,
            ],
            [
                ['C Z'], 6,
            ],
        ];
    }

    public function winningHandsProvider(): array
    {
        return [
            [
                ['A Y'], 8,
            ],
            [
                ['B Z'], 9,
            ],
            [
                ['C X'], 7,
            ],
        ];
    }
}
