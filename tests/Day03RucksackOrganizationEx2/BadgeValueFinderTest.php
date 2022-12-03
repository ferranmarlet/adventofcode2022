<?php

declare(strict_types=1);

namespace Tests;

use Kata\Day03RucksackOrganizationEx2\BadgeValueFinder;
use PHPUnit\Framework\TestCase;

class BadgeValueFinderTest extends TestCase
{
    private const VALUE_FOR_A = 27;
    private const VALUE_FOR_b = 2;

    /**
    * @test
    */
    public function should_find_badge_when_only_badge_is_present(): void
    {
        $bags = [
            'A',
            'A',
            'A',
        ];
        self::assertEquals(self::VALUE_FOR_A, BadgeValueFinder::execute($bags));
    }

    /**
    * @test
    */
    public function should_find_badge_when_many_items_are_present(): void
    {
        $bags = [
            'aAbc',
            'Ade',
            'fgAhi',
        ];
        self::assertEquals(self::VALUE_FOR_A, BadgeValueFinder::execute($bags));
    }

    /**
    * @test
    */
    public function should_find_badges_when_many_elves_are_present(): void
    {
        $bags = [
            'aAbc',
            'Ade',
            'fgAhi',
            'babc',
            'bcde',
            'fghib',
        ];
        self::assertEquals(self::VALUE_FOR_A + self::VALUE_FOR_b, BadgeValueFinder::execute($bags));
    }
}
