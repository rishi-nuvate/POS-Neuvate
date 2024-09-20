<?php

namespace App\Http\Requests;

use App\Models\Company;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreCompanyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Gate::allows('create',Company::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'CompanyName' => 'required|string|max:255|unique:companies,CompanyName',
            'BillingName' => 'required|string|max:255|unique:companies,BillingName',
            'BillingMobileNo' => 'required|integer|unique:companies,BillingMobileNo',
            'BillingEmail' => 'required|string|max:255|unique:companies,BillingEmail',
            'AddLine1' => 'required|unique:companies,AddLine1',
            'AddLine2' => 'required|unique:companies,AddLine2',
        ];
    }
}
