<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:categories|max:80',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please add a name',
            'name.unique:categories' => 'Project name already in use',
            'name.max' => 'Project name cannot exceed 70 characters',
        ];
    }
}