<?php

namespace App\Http\Requests;

use App\Models\Fit;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreFitRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Gate::allows('create', Fit::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'fit_name' => 'required|string|unique:fits,fit_name',
            'cat_id' => ['required'],
            'sub_cat_id' => ['required'],
        ];
    }
}
