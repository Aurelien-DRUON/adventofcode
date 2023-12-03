<?php

namespace App\Solutions\Year_2023;

class Solution_02
{
    public function silver(string $data): string
    {
        $result = 0;
        $data = explode("\n", $data);
        foreach ($data as $line) {
            if ($line !== "") {
                $blue = true;
                $red = true;
                $green = true;
                $huhs = explode(" ", $line);
                $id = intval($huhs[1]);
                for ($i = 2; $i < count($huhs); $i += 2) {
                    $color = str_replace([',', ';'], '', $huhs[$i + 1]);
                    switch ($color) {
                        case "red":
                            if (intval($huhs[$i]) > 12 && $red) {
                                $red = false;
                            }
                            break;
                        case "green":
                            if (intval($huhs[$i]) > 13 && $green) {
                                $green = false;
                            }
                            break;
                        case "blue":
                            if (intval($huhs[$i]) > 14 && $blue) {
                                $blue = false;
                            }
                            break;
                    }
                }
                if ($red && $green && $blue) {
                    $result += $id;
                }
            }
        }
        return $result;
    }

    public function gold(string $data): string
    {
        $result = 0;
        $data = explode("\n", $data);
        foreach ($data as $line) {
            if ($line !== "") {
                $blue = 0;
                $red = 0;
                $green = 0;
                $huhs = explode(" ", $line);
                for ($i = 2; $i < count($huhs); $i += 2) {
                    $color = str_replace([',', ';'], '', $huhs[$i + 1]);
                    switch ($color) {
                        case "red":
                            if (intval($huhs[$i]) > $red) {
                                $red = intval($huhs[$i]);
                            }
                            break;
                        case "green":
                            if (intval($huhs[$i]) > $green) {
                                $green = intval($huhs[$i]);
                            }
                            break;
                        case "blue":
                            if (intval($huhs[$i]) > $blue) {
                                $blue = intval($huhs[$i]);
                            }
                            break;
                    }
                }
                $power = $red * $green * $blue;
                $result += $power;
            }
        }
        return $result;
    }
}
