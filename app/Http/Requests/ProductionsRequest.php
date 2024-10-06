<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Illuminate\Foundation\Http\FormRequest;

class ProductionsRequest extends FormRequest
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
            'title' => ['required', 'unique:productions', Rule::unique('productions')->ignore($this->route()->parameter('production'))],
            'slug' => ['required', 'min:4', 'regex:/^[A-Za-z0-9\-]+$/', Rule::unique('productions')->ignore($this->route()->parameter('production'))],
            'image' => ['image', 'min:100', 'max:10000'],
            'content' => [],
            'categories' => ['array', 'exists:categories,id'],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'slug' => $this->input('slug') ?: Str::slug($this->input('title'))
        ]);
    }
}
