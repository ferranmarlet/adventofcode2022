<?php

declare(strict_types=1);

namespace Kata\Day08TreeTopTreehouseEx1;

class VisibleTreeCounter
{
    public static function execute(array $treeGrid): int
    {
        $visibleTrees = 0;

        for ($row = 0; $row < count($treeGrid); $row++) {
            for ($column = 0; $column < count($treeGrid[0]); $column++) {
                if (self::checkIfTreeIsVisible($treeGrid, $row, $column)) {
                    $visibleTrees++;
                }
            }
        }

        return $visibleTrees;
    }

    private static function checkIfTreeIsVisible(array $treeGrid, int $coordinateX, int $coordinateY): bool
    {
        $maxTreeHeightFromNorth = -1;

        for ($row = 0; $row < $coordinateX; $row++) {
            if ($treeGrid[$row][$coordinateY] > $maxTreeHeightFromNorth) {
                $maxTreeHeightFromNorth = $treeGrid[$row][$coordinateY];
            }
        }

        if ($treeGrid[$coordinateX][$coordinateY] > $maxTreeHeightFromNorth) {
            return true;
        }

        $maxTreeHeightFromSouth = -1;

        for ($row = count($treeGrid) - 1; $row > $coordinateX; $row--) {
            if ($treeGrid[$row][$coordinateY] > $maxTreeHeightFromSouth) {
                $maxTreeHeightFromSouth = $treeGrid[$row][$coordinateY];
            }
        }

        if ($treeGrid[$coordinateX][$coordinateY] > $maxTreeHeightFromSouth) {
            return true;
        }

        $maxTreeHeightFromEast = -1;

        for ($column = 0; $column < $coordinateY; $column++) {
            if ($treeGrid[$coordinateX][$column] > $maxTreeHeightFromEast) {
                $maxTreeHeightFromEast = $treeGrid[$coordinateX][$column];
            }
        }

        if ($treeGrid[$coordinateX][$coordinateY] > $maxTreeHeightFromEast) {
            return true;
        }

        $maxTreeHeightFromWest = -1;

        for ($column = count($treeGrid[0]) - 1; $column > $coordinateY; $column--) {
            if ($treeGrid[$coordinateX][$column] > $maxTreeHeightFromWest) {
                $maxTreeHeightFromWest = $treeGrid[$coordinateX][$column];
            }
        }

        if ($treeGrid[$coordinateX][$coordinateY] > $maxTreeHeightFromWest) {
            return true;
        }

        return false;
    }
}
