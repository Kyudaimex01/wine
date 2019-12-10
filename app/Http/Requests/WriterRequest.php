<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WriterRequest extends FormRequest
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
                    // 'password_confirm' => 'required|same:password',
                ];
            }
            case 'PUT':
            case 'PATCH': {
                return [
                    'firstname' => 'required|max:100',
                    'lastname' => 'required|max:100',
                    // 'email' => 'required|unique:users,email,' . $this->user->id,
                    'email' => 'required|email|unique:users,email, ' . $this->user->id,
                    'password' => 'required|between:3,32',
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
            'firstname.required' => 'El campo :attribute es obligatorio.',
            'lastname.required' => 'El campo :attribute es obligatorio.',
            'firstname.max' => 'El campo :attribute no debe ser mayor a 100 caracteres.',
            'lastname.max' => 'El campo :attribute no debe ser mayor a 100 caracteres.',
            'email.required' => 'El campo :attribute es obligatorio.',
            'email.unique' => 'El campo :attribute ya existe.',
            'password.required' => 'El campo :attribute es obligatorio.',
            'password.between' => 'El campo :attribute debe tener 3 a 32 caracteres.',
        ];
    }

    public function attributes()
    {
        return [
            'firstname' => 'Nombre',
            'lastname' => 'Apellido',
            'email' => 'E-mail',
            'password' => 'Password',
        ];
    }


}
