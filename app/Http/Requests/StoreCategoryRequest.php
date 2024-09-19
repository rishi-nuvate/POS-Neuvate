<?php

namespace App\Http\Requests;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Gate::allows('create', Category::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'CategoryName' => 'required|string|max:255|unique:categories,name',
            'SubCatName' => 'required|array|min:1|distinct', // Ensures subjects is an array with unique values
            'SubCatName.*' => 'required|string|max:255|unique:sub_categories,name',
        ];
    }
}
