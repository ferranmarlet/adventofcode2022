<?php

declare(strict_types=1);

namespace Kata\Day03RucksackOrganizationEx1;

class MisplacedItemCounter
{
    public static function execute(array $bags): int
    {
        return self::getValueFromItem(
            self::findRepeatedItem($bags[0])
        );
    }

    private static function getValueFromItem(string $item): int
    {
        $value = ord($item);
        if ($item[0] >= 'a' && $item[0] <= 'z') {
            return $value - 96;
        } else {
            return $value - 38;
        }
    }

    private static function findRepeatedItem($bag): string
    {
        $firstCompartiment = substr($bag, 0, strlen($bag)/2);
        $secondCompartiment = substr($bag, strlen($bag)/2, strlen($bag));
        foreach (str_split($firstCompartiment) as $item) {
            if (str_contains($secondCompartiment, $item)) {
                return $item;
            }
        }
    }
}
