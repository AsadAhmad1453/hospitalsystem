<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePatientRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:patients,email',
            'phone' => 'required|string|max:20',
            'age' => 'required|string|max:20',
            'sex' => 'required|string|max:20',
            'city' => 'required|string|max:50',
            'address' => 'required|string|max:255',
            'dateofbirth' => 'required|date',
            'user_id' => 'required|exists:users,id',
            'cnic' => 'required|string|max:20',
            'unique_number' => 'required|string|max:255|unique:patients,unique_number',
            'patient_status' => 'required|in:0,1',
            'services' => 'required|array|min:1',
        ];
    }
}
