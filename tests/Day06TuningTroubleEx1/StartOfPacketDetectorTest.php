<?php

declare(strict_types=1);

namespace Tests;

use Kata\Day06TuningTroubleEx1\StartOfPacketDetector;
use PHPUnit\Framework\TestCase;

class StartOfPacketDetectorTest extends TestCase
{
    /**
    * @test
    */
    public function should_detect_start_when_no_chars_are_repeated(): void
    {
        $message = 'abcd';
        self::assertEquals(4, StartOfPacketDetector::execute($message));
    }

    /**
    * @test
    */
    public function should_detect_start_when_chars_are_repeated(): void
    {
        $message = 'acababcd';
        self::assertEquals(8, StartOfPacketDetector::execute($message));
    }

}
