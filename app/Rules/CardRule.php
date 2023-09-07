<?php

namespace App\Rules;

use App\Helpers\GeneralHelpers;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class CardRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!GeneralHelpers::cardIsValid($value)) {
            $fail('The :attribute card number is invalid.');
        }
    }
}
