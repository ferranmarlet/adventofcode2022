<?php

declare(strict_types=1);

namespace Tests;

use Kata\Day02RockPaperSissorsEx2\RockPaperSissorsCounter;
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

        self::assertEquals(12, RockPaperSissorsCounter::getPointsFromGuide($guide));
    }

    public function losingHandsProvider(): array
    {
        return [
            [
                ['A X'], 3,
            ],
            [
                ['B X'], 1,
            ],
            [
                ['C X'], 2,
            ],
        ];
    }

    public function drawHandsProvider(): array
    {
        return [
            [
                ['A Y'], 4,
            ],
            [
                ['B Y'], 5,
            ],
            [
                ['C Y'], 6,
            ],
        ];
    }

    public function winningHandsProvider(): array
    {
        return [
            [
                ['A Z'], 8,
            ],
            [
                ['B Z'], 9,
            ],
            [
                ['C Z'], 7,
            ],
        ];
    }
}
