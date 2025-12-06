<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
        'first_name'   => 'required|string|max:50',
        'last_name' => 'required|string|max:50',
        'company_id' => 'required|integer',
        // 年
        'birth_year'   => 'required|integer|min:1900|max:' . date('Y'),

        // 月
        'birth_month'  => 'required|integer|min:1|max:12',

        // 日
        'birth_day'    => 'required|integer|min:1|max:31',
        'email' => 'nullable|email|max:254',
        'department' => 'required|string|max:100',
    ];
    }
}
