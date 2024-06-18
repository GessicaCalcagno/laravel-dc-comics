<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateComicRequest extends FormRequest
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
            'title'       => ['required', 'min:2'],
            'description' => ['min:5'],
            'type'        => ['required'],
            'thumb'       => ['required'],
            'series'      => ['required'],
            'sale_date'   => ['required'],
            'price'       => ['required'],
        ];
    }

    public function messages(): array
    {
        return[
            'title.required' => 'il titolo non può essere vuoto'
        ];
    }
}
