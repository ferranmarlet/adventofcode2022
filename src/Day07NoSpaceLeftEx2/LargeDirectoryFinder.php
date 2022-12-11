<?php

declare(strict_types=1);

namespace Kata\Day07NoSpaceLeftEx2;

class LargeDirectoryFinder
{
    public const TOTAL_DISK_SPACE = 70000000;
    public const TOTAL_FREE_SPACE_NEEDED = 30000000;

    public static function execute(FileNode $fileTree): int
    {
        $smallestDirectoryFound = self::TOTAL_DISK_SPACE;

        $freeSpace = self::TOTAL_DISK_SPACE - $fileTree->getFileTreeTotalWeight();
        $extraFreeSpaceNeeded = self::TOTAL_FREE_SPACE_NEEDED - $freeSpace;

        return self::getSmallestDirectoryAboveFreeSpaceNeeded($fileTree, $smallestDirectoryFound, $extraFreeSpaceNeeded);
    }

    private static function getSmallestDirectoryAboveFreeSpaceNeeded(FileNode $fileNode, int $smallestDirectoryFound, int $freeSpaceNeeded): int
    {
        $smallestDirectoryFound = self::getChildrenSmallestDirToDelete($fileNode, $smallestDirectoryFound, $freeSpaceNeeded);

        if ($fileNode->getFileTreeTotalWeight() < $smallestDirectoryFound
        && $fileNode->getFileTreeTotalWeight() >= $freeSpaceNeeded) {
            $smallestDirectoryFound = $fileNode->getFileTreeTotalWeight();
        }

        return $smallestDirectoryFound;
    }

    private static function getChildrenSmallestDirToDelete(FileNode $parent, int $smallestDirectoryFound, int $freeSpaceNeeded): int
    {
        $smallestChildToDelete = 0;

        foreach ($parent->getChildren() as $child) {
            if ($child->isDirectory()) {
                $smallestChildToDelete = self::getSmallestDirectoryAboveFreeSpaceNeeded($child, $smallestDirectoryFound, $freeSpaceNeeded);
                if ($smallestChildToDelete < $smallestDirectoryFound) {
                    $smallestDirectoryFound = $smallestChildToDelete;
                }
            }
        }

        return $smallestDirectoryFound;
    }
}

