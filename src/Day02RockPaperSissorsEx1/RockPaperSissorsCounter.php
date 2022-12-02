<?php

declare(strict_types=1);

namespace Kata\Day02RockPaperSissorsEx1;

class RockPaperSissorsCounter
{
    private static $winingHands = [
        'A Y',
        'B Z',
        'C X'
    ];

    private static $drawHands = [
        'A X',
        'B Y',
        'C Z',
    ];

    private static $playValues = [
        'X' => 1,
        'Y' => 2,
        'Z' => 3,
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

        return $punctuation + self::$playValues[substr($match, 2)];
    }
}
