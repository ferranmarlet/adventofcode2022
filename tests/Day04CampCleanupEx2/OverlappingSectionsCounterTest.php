<?php

declare(strict_types=1);

namespace Tests;

use Kata\Day04CampCleanupEx2\OverlappingSectionsCounter;
use PHPUnit\Framework\TestCase;

class OverlappingSectionsCounterTest extends TestCase
{
    /**
    * @test
    */
    public function should_return_zero_when_no_sections_overlap(): void
    {
        $sections = ['1-2,3-4'];
        self::assertEquals(0, OverlappingSectionsCounter::execute($sections));
    }

    /**
    * @test
    * @dataProvider singleOverlappingSectionsProvider
    */
    public function should_count_one_partially_overlapping_section($sections, $overlappingSectionsCount): void
    {
        self::assertEquals($overlappingSectionsCount, OverlappingSectionsCounter::execute($sections));
    }

    /**
    * @test
    * @dataProvider multipleOverlappingSectionsProvider
    */
    public function should_count_many_partially_overlapping_sections($sections, $overlappingSectionsCount): void
    {
        self::assertEquals($overlappingSectionsCount, OverlappingSectionsCounter::execute($sections));
    }

    public function singleOverlappingSectionsProvider(): array
    {
        return [
            [['1-4,3-4'], 1],
            [['3-4,1-4'], 1],
            [['4-4,4-4'], 1],
            [['100-200,150-200'], 1],
            [['1-4,4-5'], 1],
            [['4-5,1-4'], 1],
            [['1-4,2-6'], 1],
        ];
    }

    public function multipleOverlappingSectionsProvider(): array
    {
        return [
            [['1-4,3-4','3-4,1-4'], 2],
            [['4-4,4-4','100-200,150-200','1-4,4-5'], 3],
            [['4-5,1-4','1-4,2-6'], 2],
        ];
    }
}
