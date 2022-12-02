<?php

declare(strict_types=1);

namespace Kata\Day01CalorieCountingEx2;

class CalorieCounter {

    public function findCaloriesOfThreeMostPackedElves(array $elvesInventory): int
    {
        $elvesCalorieCount = $this->groupCaloriesByElf($elvesInventory);

        $elf1Calories = max($elvesCalorieCount);
        $key = array_search($elf1Calories, $elvesCalorieCount);
        unset($elvesCalorieCount[$key]);

        $elf2Calories = max($elvesCalorieCount);
        $key = array_search($elf2Calories, $elvesCalorieCount);
        unset($elvesCalorieCount[$key]);

        $elf3Calories = max($elvesCalorieCount);

        return $elf1Calories + $elf2Calories + $elf3Calories;
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
