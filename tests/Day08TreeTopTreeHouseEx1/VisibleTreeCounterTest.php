<?php

declare(strict_types=1);

namespace Tests;

use Kata\Day08TreeTopTreehouseEx1\VisibleTreeCounter;
use PHPUnit\Framework\TestCase;

class VisibleTreeCounterTest extends TestCase
{
    /**
    * @test
    */
    public function should_count_one_single_tree(): void
    {
        $treeGrid = [
            0 => [0],
        ];
        self::assertEquals(
            1,
            VisibleTreeCounter::execute($treeGrid)
        );
    }

    /**
    * @test
    */
    public function should_count_trees_on_the_edges(): void
    {
        $treeGrid = [
            0 => [1,1],
            1 => [1,1],
        ];
        self::assertEquals(
            4,
            VisibleTreeCounter::execute($treeGrid)
        );
    }

    /**
    * @test
    */
    public function should_not_count_hidden_tree(): void
    {
        $treeGrid = [
            0 => [1,1,1],
            1 => [1,0,1],
            2 => [1,1,1],
        ];
        self::assertEquals(
            8,
            VisibleTreeCounter::execute($treeGrid)
        );
    }

    /**
    * @test
    */
    public function should_not_count_tree_as_tall_as_surrounding_trees(): void
    {
        $treeGrid = [
            0 => [1,1,1],
            1 => [1,1,1],
            2 => [1,1,1],
        ];
        self::assertEquals(
            8,
            VisibleTreeCounter::execute($treeGrid)
        );
    }

    /**
    * @test
    * @dataProvider visibleTreesProvider
    */
    public function should_count_tree_visible_from_one_side(array $treeGrid, int $visibleTreeCount): void
    {
        self::assertEquals(
            $visibleTreeCount,
            VisibleTreeCounter::execute($treeGrid)
        );
    }

    /**
    * @test
    */
    public function should_count_visible_trees_in_complex_forest(): void
    {
        $treeGrid = [
            [3,0,3,7,3],
            [2,5,5,1,2],
            [6,5,3,3,2],
            [3,3,5,4,9],
            [3,5,3,9,0],
        ];
        self::assertEquals(21, VisibleTreeCounter::execute($treeGrid));
    }

    public function visibleTreesProvider(): array
    {
        return [
            [
                [
                    0 => [1,0,1],
                    1 => [1,1,1],
                    2 => [1,1,1],
                ],
                9
            ],
            [
                [
                    0 => [1,1,1],
                    1 => [1,1,1],
                    2 => [1,0,1],
                ],
                9
            ],
            [
                [
                    0 => [1,1,1],
                    1 => [0,1,1],
                    2 => [1,1,1],
                ],
                9
            ],
            [
                [
                    0 => [1,1,1],
                    1 => [1,1,0],
                    2 => [1,1,1],
                ],
                9
            ],
        ];
    }
}
