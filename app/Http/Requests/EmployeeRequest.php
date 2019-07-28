<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        switch($this->method())
        {
            case 'GET':
            case 'DELETE':
            {
                return [];
            }
            case 'POST':
            {
                return [
                    'full_name'             => 'required|string|max:255',
                    'email'                 => 'required|unique:employees,email|max:255|email',
                    'phone'                 => 'required|numeric|unique:employees,phone',
                    'username'              => 'required|max:255|unique:employees,username',
                    'telephone'             => 'required|unique:employees,telephone',
                    'password'              => 'required|string|min:4',
                    'gender'                => 'required',
                    'is_married'            => 'required',
                    'age'                   => 'required',
                    'birthday'              => 'required',
                    'id_expiration_date'    => 'required',
                    'is_citizen'            => 'required',
                    'nationality'           => 'required',
                    'number_id'             => 'required|unique:employees,number_id',
                    'join_date'             => 'required',
                    'status'                => 'required|string',
                    'fixed_income'          => 'required',
                    'basic'                 => 'required',
                    'housing'               => 'required',
                    'transport'             => 'required',
                    'fuel'                  => 'required',
                    'mobile'                => 'required',
                    'rules_id.*'            => 'required',
                    'documents_name.*'      => 'required|string',
                    'documents_file.*'      => 'required',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'full_name'             => 'required|string|max:255',
                    'email'                 => 'required|max:255|email|unique:employees,email'.$this->id,
                    'phone'                 => 'required|numeric|unique:employees,phone'.$this->id,
                    'username'              => 'required|max:255|unique:employees,username'.$this->id,
                    'telephone'             => 'required|unique:employees,telephone'.$this->id,
                    'password'              => 'required|string|min:4',
                    'gender'                => 'required',
                    'is_married'            => 'required',
                    'age'                   => 'required',
                    'birthday'              => 'required',
                    'id_expiration_date'    => 'required',
                    'is_citizen'            => 'required',
                    'nationality'           => 'required',
                    'number_id'             => 'required|unique:employees,number_id'.$this->id,
                    'join_date'             => 'required',
                    'status'                => 'required|string',
                    'fixed_income'          => 'required',
                    'basic'                 => 'required',
                    'housing'               => 'required',
                    'transport'             => 'required',
                    'fuel'                  => 'required',
                    'mobile'                => 'required',
                    'rules_id.*'            => 'required',
                    'documents_name.*'      => 'required|string',
                    'documents_file.*'      => 'required',
                ];
            }
            default:break;
        }
    }
}
