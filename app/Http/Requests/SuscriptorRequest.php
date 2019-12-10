<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SuscriptorRequest extends FormRequest
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
        switch ($this->method()) {
            case 'GET':
            case 'DELETE': {
                return [];
            }
            case 'POST': {
                return [
                    'firstname' => 'required|max:100',
                    'lastname' => 'required|max:100',
                    'email' => 'required|email|unique:users,email',
                    'password' => 'required|between:3,32',
                    'city' => 'required|max:100',
                    'ci' => 'required|numeric',
                    // 'password_confirm' => 'required|same:password',
                ];
            }
            case 'PUT':
            case 'PATCH': {
                return [
                    'firstname' => 'required|max:100',
                    'lastname' => 'required|max:100',
                    'email' => 'required|unique:users,email,' . $this->user->id,
                    'password' => 'required|between:3,32',
                    'city' => 'required|max:100',
                    'ci|numeric' => 'required',
                    // 'password_confirm' => 'between:3,32|same:password',
                ];
            }
            default:
                break;
        }

        return [

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El campo :attribute es obligatorio.',
            'lastname.required' => 'El campo :attribute es obligatorio.',
            'name.max' => 'El campo :attribute no debe ser mayor a 100 caracteres.',
            'lastname.max' => 'El campo :attribute no debe ser mayor a 100 caracteres.',
            'email.required' => 'El campo :attribute es obligatorio.',
            'email.unique' => 'El campo :attribute ya existe.',
            'password.required' => 'El campo :attribute es obligatorio.',
            'password.between' => 'El campo :attribute debe tener 3 a 32 caracteres.',
            'ci.required' => 'El campo :attribute es obligatorio.',
            'ci.numeric' => 'El campo :attribute solo puede contener numeros.',
            'ciudad.required' => 'El campo :attribute es obligatorio.',
            'city.max' => 'El campo :attribute debe tener 2 a 8 caracteres.',
            'city.max' => 'El campo :attribute no debe ser mayor a 100 caracteres.',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Nombre',
            'lastname' => 'Apellido',
            'email' => 'E-mail',
            'password' => 'Password',
            'ci' => 'ci',
            'city' => 'ciudad',
        ];
    }


}