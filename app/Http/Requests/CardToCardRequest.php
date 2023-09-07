<?php

namespace App\Http\Requests;

use App\Helpers\GeneralHelpers;
use App\Rules\AmountRule;
use App\Rules\CardRule;
use Illuminate\Foundation\Http\FormRequest;

class CardToCardRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'from'   => ['required', 'numeric', 'digits:16', new CardRule],
            'to'     => ['required', 'numeric', 'digits:16', new CardRule],
            'amount' => ['required', 'integer', new AmountRule]
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'from'   => GeneralHelpers::toEnglishNumbers($this->input('from')),
            'to'     => GeneralHelpers::toEnglishNumbers($this->input('to')),
            'amount' => GeneralHelpers::toEnglishNumbers($this->input('amount'))
        ]);
    }
}
