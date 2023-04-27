<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
        $route = request()->route()->getName();
        return [
            'title' => ['required', 'min:5', 'max:100', 'lowercase'],
            'description' => ['required', 'min:8'],
            'price' => ['required', 'min:1'],
            'published' => ['required', 'boolean'],
            'promotion' => ['required', 'boolean'],
            'categories' => ['required', 'exists:categories,id', 'array'],
            'sizes' => ['array', 'exists:sizes,id', 'required',],
            'image' => ['image', 'mimes:jpeg,jpg,png,webp', 'max:2000', Rule::requiredIf(str_contains($route, 'store'))],
        ];
    }

    public function messages()
    {
        return [
            'image.image' => 'The type of the uploaded file should be an image. That must be jpeg,jpg,png,webp',
            'image.max' => 'Failed to upload an image. The image maximum size is 2MB.',
        ];
    }
}
