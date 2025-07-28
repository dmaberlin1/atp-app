<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBusRequest extends FormRequest
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
            'number_plate' => ['required', 'string', 'unique:buses,number_plate'],
            'brand_id'     => ['required', 'exists:brands,id'],
            'driver_id'    => ['nullable', 'exists:drivers,id'],
        ];
    }
}
