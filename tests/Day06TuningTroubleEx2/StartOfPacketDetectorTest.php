<?php

declare(strict_types=1);

namespace Tests;

use Kata\Day06TuningTroubleEx2\StartOfMessageDetector;
use PHPUnit\Framework\TestCase;

class StartOfPacketDetectorTest extends TestCase
{
    /**
    * @test
    */
    public function should_detect_start_when_no_chars_are_repeated(): void
    {
        $message = 'abcdefghijklmn';
        self::assertEquals(
            StartOfMessageDetector::CHARS_WITHOUT_REPETITION_NEEDED,
            StartOfMessageDetector::execute($message)
        );
    }

    /**
    * @test
    */
    public function should_detect_start_when_chars_are_repeated(): void
    {
        $message = 'acababcdefghijklmn';
        $repeatingCharAmount = 4;
        self::assertEquals(
            $repeatingCharAmount + StartOfMessageDetector::CHARS_WITHOUT_REPETITION_NEEDED,
            StartOfMessageDetector::execute($message)
        );
    }

}
