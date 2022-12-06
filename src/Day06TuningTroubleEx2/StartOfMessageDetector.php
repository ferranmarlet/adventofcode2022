<?php

declare(strict_types=1);

namespace Kata\Day06TuningTroubleEx2;

class StartOfMessageDetector
{
    public const CHARS_WITHOUT_REPETITION_NEEDED = 14;
    private const CHAR_DIFFERENCE_TO_START_OF_MESSAGE = 13;

    public static function execute(string $message): int
    {
        $message = str_split($message);

        for ($i = self::CHAR_DIFFERENCE_TO_START_OF_MESSAGE; $i <= count($message); $i++) {
            if (self::checkMinimumCharsAreUnique(array_slice($message, $i - self::CHAR_DIFFERENCE_TO_START_OF_MESSAGE, self::CHARS_WITHOUT_REPETITION_NEEDED))) {
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
