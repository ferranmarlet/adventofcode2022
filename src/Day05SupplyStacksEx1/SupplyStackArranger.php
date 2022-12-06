<?php

declare(strict_types=1);

namespace Kata\Day05SupplyStacksEx1;

class SupplyStackArranger
{
    public const AMOUNT_KEY = 0;
    public const FROM_KEY = 1;
    public const TO_KEY = 2;

    public static function execute(array $stacks, array $movements): string
    {
        foreach ($movements as $movement) {
            for ($crate = 0; $crate < $movement[self::AMOUNT_KEY]; $crate++) {
                $movingCrate = array_pop($stacks[$movement[self::FROM_KEY]]);
                array_push($stacks[$movement[self::TO_KEY]], $movingCrate); 
            }
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
