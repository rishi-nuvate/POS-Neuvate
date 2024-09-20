<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Gate::allows('update', $this->route('category'));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        $categoryId = $this->route('category')->id;

        return [
            'CategoryName' => ['required','string','max:255',Rule::unique('categories', 'name')->ignore($categoryId),],
            'SubCatName' => 'required|array|min:1|distinct', // Ensures subjects is an array with unique values
            'NewSubCatName' => 'array|min:1|distinct', // Ensures subjects is an array with unique values
            'NewSubCatName.*' => 'string|max:255|unique:sub_categories,name',
        ];
    }
}
