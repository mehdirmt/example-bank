<?php

namespace App\Helpers;

class GeneralHelpers
{
    /**
     * Convert persian/arabic numbers to english
     */
    public static function toEnglishNumbers(string $input): string
    {
        $range = range(0, 9);

        $persianDecimal = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹']; // persian
        $arabicDecimal = ['٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩'];  // arabic

        $input =  str_replace($persianDecimal, $range, $input);
        $input =  str_replace($arabicDecimal, $range, $input);

        return $input;
    }

    /**
     * Check card number validity
     */
    public static function cardIsValid(string $card): bool
    {
        $card = (string) preg_replace('/\D/', '', $card);

        $strlen = strlen($card);

        if (16 != $strlen) {
            return false;
        }
        
        if (!in_array($card[0], [2, 4, 5, 6, 9])) {
            return false;
        }

        for ($i = 0; $i < $strlen; $i++) {
            $res[$i] = $card[$i];
            if (($strlen % 2) == ($i % 2)) {
                $res[$i] *= 2;
                if ($res[$i] > 9)
                    $res[$i] -= 9;
            }
        }

        return array_sum($res) % 10 == 0 ? true : false;
    }
}
