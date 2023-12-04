<?php

namespace App\Solutions\Year_2023;

class Solution_04
{
    public function silver(string $data): string
    {
        $result = 0;
        $data = explode("\n", $data);
        array_pop($data);
        foreach ($data as $line) {
            $lineresult = 0;
            $nums = explode("|", $line);
            $cardnum = explode(":", $nums[0]);
            $winnums = explode(" ", $cardnum[1]);
            $winnums = array_filter($winnums, function ($value) {
                return $value !== "";
            });
            $getnums = explode(" ", $nums[1]);
            foreach ($getnums as $getnum) {
                if (in_array($getnum, $winnums)) {
                    $lineresult += 1;
                }
            }
            if ($lineresult > 0) {
                $result += 2 ** ($lineresult - 1);
            }
        }
        return $result;
    }

    public function gold(string $data): string
    {
        return 'todo';
    }
}
