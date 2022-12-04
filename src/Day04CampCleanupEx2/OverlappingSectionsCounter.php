<?php

declare(strict_types=1);

namespace Kata\Day04CampCleanupEx2;

class OverlappingSectionsCounter
{
    public static function execute(array $sections): int
    {
        $totalOverlappingSections = 0;

        foreach ($sections as $sectionPair) {
            $sectionPair = explode(',', $sectionPair);
            $section1 = explode('-', $sectionPair[0]);
            $section2 = explode('-', $sectionPair[1]);
            if (self::areOverlappingSections($section1, $section2)) {
                $totalOverlappingSections++;
            }
        }

        return $totalOverlappingSections;
    }

    private static function areOverlappingSections(array $section1, array $section2): bool
    {
        return (($section1[0] <= $section2[1] && $section1[1] >= $section2[0]) || ($section1[0] >= $section2[1] && $section1[1] <= $section2[0]));
    }
}
