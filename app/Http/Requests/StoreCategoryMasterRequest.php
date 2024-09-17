<?php

namespace App\Http\Requests;

use App\Models\CategoryMaster;
use App\Models\Tags;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreCategoryMasterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Gate::allows('create', CategoryMaster::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'CategoryName' => 'required|string|max:255|unique:category_masters,CategoryName',
//            'SubCatName' => 'required|array|min:1|distinct', // Ensures subjects is an array with unique values
//            'SubCatName.*' => 'required|string|max:255|unique:sub_category_masters,SubCatName',
        ];
    }
}
