<?php

declare(strict_types=1);

namespace Tests;

use Kata\Day05SupplyStacksEx1\SupplyStackArranger;
use PHPUnit\Framework\TestCase;

class SupplyStackArrangerTest extends TestCase
{
    /**
    * @test
    */
    public function should_return_initial_state_if_there_are_no_movements(): void
    {
        $stacks = [
            '1' => ['A','B'],
        ];
        $movements = [];

        self::assertEquals('B', SupplyStackArranger::execute($stacks, $movements));
    }

    /**
    * @test
    */
    public function should_move_one_crate_from_1_to_2(): void
    {
        $stacks = [
            '1' => ['A','B'],
            '2' => ['C'],
        ];
        $amount = '1';
        $fromStack = '1';
        $toStack = '2';
        $movements = [
            [$amount, $fromStack, $toStack]
        ];

        self::assertEquals('AB', SupplyStackArranger::execute($stacks, $movements));
    }

    /**
    * @test
    */
    public function should_move_many_crates(): void
    {
        $stacks = [
            '1' => ['A','X','Z'],
            '2' => ['D'],
        ];
        $amount = '2';
        $fromStack = '1';
        $toStack = '2';
        $movements = [
            [$amount, $fromStack, $toStack]
        ];

        self::assertEquals('AX', SupplyStackArranger::execute($stacks, $movements));
    }

    /**
    * @test
    */
    public function should_move_crates_in_many_movements(): void
    {
        $stacks = [
            '1' => ['A','X','Z'],
            '2' => ['D','E'],
            '3' => ['F','G'],
        ];
        $movements = [
            ['1','1','2'],
            ['1','1','3'],
            ['1','3','2'],
        ];

        self::assertEquals('AXG', SupplyStackArranger::execute($stacks, $movements));
    }
}
