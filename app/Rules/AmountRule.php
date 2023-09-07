<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class AmountRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $min = config('transfer.card_to_card.min_amount');
        $max = config('transfer.card_to_card.max_amount');

        if ($min > $value || $max < $value) {
            $fail("The :attribute should be between $min and $max tomans.");
        }
    }
}
