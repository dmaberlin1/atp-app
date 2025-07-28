<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;

class StoreDriverRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string'],
            'last_name'  => ['required', 'string'],
            'birth_date' => ['required', 'date', function ($attribute, $value, $fail) {
                if (Carbon::parse($value)->age >= 65) {
                    $fail('Водитель должен быть младше 65 лет.');
                }
            }],
            'email'      => ['required', 'email', Rule::unique('drivers', 'email')],
            'salary'     => ['required', 'numeric', 'min:0'],
            'image'      => ['nullable', 'image'],
            'image_description' => ['nullable', 'string'],
        ];
    }
}
