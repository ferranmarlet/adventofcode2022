<?php

declare(strict_types=1);

namespace Kata\Day01CalorieCountingEx1;

class CalorieCounter {

    public function findCaloriesOfElfWithMoreCalories(array $elvesInventory): int
    {
        $elvesCalorieCount = $this->groupCaloriesByElf($elvesInventory);

        return max($elvesCalorieCount);
    }

    private function groupCaloriesByElf(array $elvesInventory): array
    {
        $result = [
            0 => 0
        ];
        $i = 0;

        foreach ($elvesInventory as $item) {
            if ($item != '') {
                $result[$i] = isset($result[$i]) ? $result[$i] + $item : $item;
            } else {
                $i++;
            }
        }

        return $result;
    }
}
