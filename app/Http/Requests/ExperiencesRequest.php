<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class ExperiencesRequest extends FormRequest
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
            'title' => ['required', 'min:4', Rule::unique('experiences')->ignore($this->route()->parameter('experience'))],
            'slug' => ['required', 'min:4', 'regex:/^[A-Za-z0-9\-]+$/', Rule::unique('experiences')->ignore($this->route()->parameter('experience'))],
            'image' => ['image', 'min:100', 'max:2000'],
            'company' => ['required', ],
            'content' => [],
            'categories' => ['array', 'exists:categories,id'],
            'time' => ['max:30', 'required'],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'slug' => $this->input('slug') ?: Str::slug($this->input('title'))
        ]);
    }
}
