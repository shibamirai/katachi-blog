<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdminPostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->can('admin');
    }

    public function rules(): array
    {
        return [
            'title' => 'required',
            'thumbnail' => 'image',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ];
    }
}
