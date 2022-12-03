<?php

declare(strict_types=1);

namespace Tests;

use Kata\Day03RucksackOrganizationEx1\MisplacedItemCounter;
use PHPUnit\Framework\TestCase;

class MisplacedItemCounterTest extends TestCase
{
    private const VALUE_FOR_A = 27;
    private const VALUE_FOR_b = 2;

    /**
    * @test
    */
    public function should_count_repeated_item_with_one_item(): void
    {
        $bags = ['AA'];
        self::assertEquals(self::VALUE_FOR_A, MisplacedItemCounter::execute($bags));
    }

    /**
    * @test
    */
    public function should_count_repeated_item_with_many_items(): void
    {
        $bags = ['abcb'];
        self::assertEquals(self::VALUE_FOR_b, MisplacedItemCounter::execute($bags));
    }

    /**
    * @test
    */
    public function should_count_repeated_items_from_multiple_bags(): void
    {
        $bags = [
            'vJrwpWtwJgWrhcsFMMfFFhFp',
            'jqHRNqRjqzjGDLGLrsFMfFZSrLrFZsSL',
            'PmmdzqPrVvPwwTWBwg',
            'wMqvLMZHhHMvwLHjbvcjnnSBnvTQFn',
            'ttgJtRGJQctTZtZT',
            'CrZsJsPPZsGzwwsLwLmpwMDw'
        ];
        $valueOfMisplacedItems = 157;
        self::assertEquals(
            $valueOfMisplacedItems,
            MisplacedItemCounter::execute($bags)
        );
    }
}
