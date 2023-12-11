<?php

namespace App\Solutions\Year_2023;

class Solution_08
{
    public function silver(string $data): string
    {
        $result = 0;
        // $table = [];
        // $lines = explode("\n", $data);
        // array_pop($lines);
        // $instructions = array_shift($lines);
        // array_shift($lines);
        // foreach ($lines as $line) {
        //     $line = explode(' ', $line);
        //     $title = $line[0];
        //     $pre_left = explode('(', $line[2]);
        //     $pre_left = explode(',', $pre_left[1]);
        //     $left = $pre_left[0];
        //     $right = explode(')', $line[3])[0];
        //     $table[$title] = ["left" => $left, "right" => $right];
        // }
        // $id = "AAA";
        // $count = 0;
        // $i = 0;
        // $next = "";
        // dump($table["AAA"]);
        // while (true) {
        //     $count += 1;
        //     $line = $table[$id];
        //     switch ($instructions[$i]) {
        //         case "L":
        //             $next = $line["left"];
        //             break;
        //         case "R":
        //             $next = $line["right"];
        //             break;
        //     }
        //     if ($next === "ZZZ") {
        //         break;
        //     } else {
        //         $id = $next;
        //     }
        //     if ($i == strlen($instructions) - 1) {
        //         $i = 0;
        //     } else {
        //         $i += 1;
        //     }
        // }
        // $result = $count;
        return $result;
    }

    public function gold(string $data): string
    {
        $result = 0;
        $table = [];
        $lines = explode("\n", $data);
        array_pop($lines);
        $instructions = array_shift($lines);
        array_shift($lines);
        foreach ($lines as $line) {
            $line = explode(' ', $line);
            $title = $line[0];
            $pre_left = explode('(', $line[2]);
            $pre_left = explode(',', $pre_left[1]);
            $left = $pre_left[0];
            $right = explode(')', $line[3])[0];
            $table[$title] = ["left" => $left, "right" => $right];
        }
        $ids = [];
        $oks = [];
        foreach (array_keys($table) as $key) {
            if ($key[2] === "A") {
                array_push($ids, $key);
                array_push($oks, false);
            }
        }
        $i = 0;
        $count = 0;
        $next = $ids;
        while (true) {
            $y = 0;
            $count += 1;
            foreach ($ids as $id) {
                switch ($instructions[$i]) {
                    case "L":
                        $next[$y] = $line["left"];
                        if ($next[$y][2] === "Z") {
                            $oks[$y] = true;
                        } else {
                            $oks[$y] = false;
                        }
                        break;
                    case "R":
                        $next[$y] = $line["left"];
                        if ($next[$y][2] === "Z") {
                            $oks[$y] = true;
                        } else {
                            $oks[$y] = false;
                        }
                        break;
                }
                $y += 1;
            }
            if (in_array(false, $next, true)) {
                $ids = $next;
            } else {
                break;
            }
            if ($i == strlen($instructions) - 1) {
                $i = 0;
            } else {
                $i += 1;
            }
            $y += 1;
        }
        $result = $count;
        return $result;
    }
}
