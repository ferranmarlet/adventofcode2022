<?php

declare(strict_types=1);

namespace Kata\Day06TuningTroubleEx1;

class StartOfPacketDetector
{
    public const CHARS_WITHOUT_REPETITION_NEEDED = 4;

    public static function execute(string $message): int
    {
        $message = str_split($message);

        for ($i = 3; $i <= count($message); $i++) {
            if (self::checkMinimumCharsAreUnique(array_slice($message, $i - 3, self::CHARS_WITHOUT_REPETITION_NEEDED))) {
                return self::adaptCounterToListThatCountsFrom1($i);
            }
        }
    }

    private static function checkMinimumCharsAreUnique(array $chars): bool
    {
        return count(array_unique($chars)) == self::CHARS_WITHOUT_REPETITION_NEEDED;
    }

    private static function adaptCounterToListThatCountsFrom1(int $counter): int
    {
        return $counter + 1;
    }
}
