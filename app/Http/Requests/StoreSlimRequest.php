<?php

namespace App\Http\Requests;

use App\Models\Slim;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreSlimRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Gate::allows('create',Slim::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'slim_name' => 'required|string|unique:slims,slim_name',
            'cat_id' => ['required'],
            'sub_cat_id' => ['required'],
        ];
    }
}
