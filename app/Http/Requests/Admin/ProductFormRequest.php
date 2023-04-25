<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
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
            'title' => ['required', 'min:5', 'max:100'],
            'description' => ['required', 'min:8'],
            'price' => ['required', 'min:1'],
            'published' => ['required', 'boolean'],
            'promotion' => ['required', 'boolean'],
        ];
    }
}
