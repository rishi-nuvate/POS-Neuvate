<?php

namespace App\Http\Requests;

use App\Models\Sleeve;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreSleeveRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Gate::allows('create', Sleeve::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'sleeve_name' => 'required|string|unique:sleeves,sleeve_name',
            'cat_id' => ['required'],
            'sub_cat_id' => ['required'],
        ];
    }
}
