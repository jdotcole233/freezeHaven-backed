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
            "first_name"=> "required|string|max:100",
            "last_name"=> "required|string|max:100",
            "phone_number" => "required|string|max:24",
            "date_employed"=> "required|date",
            "dob"=> "required|date",
            "date_of_termination"=> "nullable|date",
            "location"=> "required|string|max:100",
            "gender"=> "required|string",
        ];
    }
}
