<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignupRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'f_name'=>'required',
            'l_name'=>'required',
            'mail'=>'required|email|unique:utilisateurs,mail',
            'birth_date'=>'required|date',
            'birth_city'=>'required|string',
            'code'=>'',
            'pwd'=>'required|string',
            'cpwd'=>'required|string',
            'typemembre_id'=>'required|exists:typemembres,id'
        ];
    }
}
