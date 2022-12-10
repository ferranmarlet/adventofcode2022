<?php

declare(strict_types=1);

namespace Kata\Day07NoSpaceLeftEx1;

class LightDirectoryFinder
{
    public const LIGHT_FOLDERS_WEIGHT_LIMIT = 100000;

    public static function execute(FileNode $fileTree): int
    {
        $accumulatedWeight = 0;

        self::getLightDirectoriesTotalWeight($fileTree, $accumulatedWeight);

        return $accumulatedWeight;
    }

    private static function getLightDirectoriesTotalWeight(FileNode $fileNode, int &$accumulatedWeight): int
    {
        $totalDirectorySize = 0;

        foreach ($fileNode->getChildren() as $child) {
            if ($child->isFile()) {
                $totalDirectorySize += $child->getSize();
            } else {
                $totalDirectorySize += self::getLightDirectoriesTotalWeight($child, $accumulatedWeight);
            }
        }

        if ($totalDirectorySize <= self::LIGHT_FOLDERS_WEIGHT_LIMIT) {
            if (!$fileNode->isRoot()) {
                $accumulatedWeight += $totalDirectorySize;
            }
        }
        return $totalDirectorySize;
    }
}
