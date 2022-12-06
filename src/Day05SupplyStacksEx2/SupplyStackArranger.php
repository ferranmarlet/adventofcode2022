<?php

declare(strict_types=1);

namespace Kata\Day05SupplyStacksEx2;

class SupplyStackArranger
{
    public const AMOUNT_KEY = 0;
    public const FROM_KEY = 1;
    public const TO_KEY = 2;

    public static function execute(array $stacks, array $movements): string
    {
        foreach ($movements as $movement) {
            $movingCrates = array_splice($stacks[$movement[self::FROM_KEY]], count($stacks[$movement[self::FROM_KEY]]) - ($movement[self::AMOUNT_KEY]));
            $stacks[$movement[self::TO_KEY]] = array_merge($stacks[$movement[self::TO_KEY]], $movingCrates);
        }

        return self::concatEveryStackTopElement($stacks);
    }
    
    private static function concatEveryStackTopElement(array $stacks): string
    {
        return array_reduce(
            $stacks,
            [__CLASS__, 'concatNextStackTopElement']
        );
    }

    private static function concatNextStackTopElement(?string $topElements, ?array $stack): string
    {
        $topElements .= array_pop($stack);
        return $topElements;
    }
}
