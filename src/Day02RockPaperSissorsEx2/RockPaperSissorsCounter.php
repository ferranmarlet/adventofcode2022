<?php

declare(strict_types=1);

namespace Kata\Day02RockPaperSissorsEx2;

class RockPaperSissorsCounter
{
    private static $winingHands = [
        'A Z',
        'B Z',
        'C Z'
    ];

    private static $drawHands = [
        'A Y',
        'B Y',
        'C Y',
    ];

    private static $playValues = [
        'A X' => 3,
        'A Y' => 1,
        'A Z' => 2,
        'B X' => 1,
        'B Y' => 2,
        'B Z' => 3,
        'C X' => 2,
        'C Y' => 3,
        'C Z' => 1,
    ];

    public static function getPointsFromGuide(array $guide): int
    {
        $punctuation = 0;

        foreach ($guide as $match) {
            $punctuation += self::getMatchPoints($match);
        }

        return $punctuation;
    }

    private static function getMatchPoints(string $match): int
    {
        $punctuation = 0;

        if (in_array($match, self::$drawHands)) {
            $punctuation += 3;
        }

        if (in_array($match, self::$winingHands)) {
            $punctuation += 6;
        }

        return $punctuation + self::$playValues[$match];
    }
}
