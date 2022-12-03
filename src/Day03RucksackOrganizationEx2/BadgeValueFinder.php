<?php

declare(strict_types=1);

namespace Kata\Day03RucksackOrganizationEx2;

class BadgeValueFinder
{
    public static function execute(array $bags): int
    {
        $totalBadgeValue = 0;

        for ($i = 0; $i < count($bags); $i+=3) {
            $totalBadgeValue += self::getBadgeValueFromBags($bags[$i], $bags[$i+1], $bags[$i+2]);
        }

        return $totalBadgeValue;
    }

    private static function getBadgeValueFromBags(string $bag1, string $bag2, string $bag3): int
    {
        return self::getValueFromItem(
            self::findRepeatedItem($bag1, $bag2, $bag3)
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

    private static function findRepeatedItem(string $bag1, string $bag2, string $bag3): string
    {
        $potentiallyRepeatedItems = $bag1;

        foreach (str_split($potentiallyRepeatedItems) as $item) {
            if (str_contains($bag2, $item) && str_contains($bag3, $item)) {
                return $item;
            }
        }
    }
}
