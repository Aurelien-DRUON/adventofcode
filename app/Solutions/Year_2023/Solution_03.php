<?php

namespace App\Solutions\Year_2023;

class Solution_03
{
    public function silver(string $data): string
    {
        $result = 0;
        $data = explode("\n", $data);
        array_pop($data);
        for ($y = 0; $y < count($data); $y++) {
            $line = $data[$y];
            for ($x = 0; $x < strlen($line); $x++) {
                $char = $line[$x];
                if (is_numeric($char)) {
                    $is_ok = false;
                    $number = $char;
                    for ($i = 1; is_numeric($line[$x + $i]); $i++) {
                        $number = $number . $line[$x + $i];
                    }
                    if ($y > 0) {
                        $yrem = 1;
                    } else {
                        $yrem = 0;
                    }
                    if ($y < count($data)) {
                        $yadd = 1 + $yrem;
                    } else {
                        $yadd = $yrem;
                    }
                    if ($x > 0) {
                        $xrem = 1;
                    } else {
                        $xrem = 0;
                    }
                    if ($x < strlen($line) - strlen($number)) {
                        $xadd = strlen($number) + $xrem;
                    } else {
                        $xadd = strlen($number) - 1 + $xrem;
                    }
                    for ($y2 = $y - $yrem; $y2 <= $y + $yadd; $y2++) {
                        for ($x2 = $x - $xrem; $x2 <= $x + $xadd; $x2++) {
                            dump($data[$y2][$x2]);
                            dump($y2, $x2);
                            if (!$is_ok) {
                                if ($data[$y2][$x2] !== "." || !is_numeric($data[$y2][$x2])) {
                                    $result += intval($number);
                                    $is_ok = true;
                                }
                            }
                        }
                    }
                    $x += $i;
                }
            }
        }
        return  $result;
    }

    public function gold(string $data): string
    {
        return 'todo';
    }
}
