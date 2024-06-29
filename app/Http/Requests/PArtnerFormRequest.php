<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class PartnerFormRequest extends FormRequest
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
        $rules = [
            'name' => 'required|max:150',
            'identifier' => 'required|unique:partners|max:30',
            'last_name' => 'required|max:150',
            'age' => 'required|max:2',
            'phone' => 'required|max:10',
            'phone_emergency' => 'required|max:10',
        ];
        if ($this->method() == 'PUT') {
            $rules = [
                //'identifier' => ['required', 'max:30', Rule::unique('partners')->ignore(request()->route('socios'))],
                'name' => 'sometimes|required|max:150',
                'last_name' => 'sometimes|required|max:150',
                'age' => 'sometimes|required|max:2',
                'phone' => 'sometimes|required|max:10',
                'phone_emergency' => 'sometimes|required|max:10',
            ];
        }
        return $rules;
    }
    public function messages()
    {
        $messages = [
            'name.required' => 'Campo nombre es necesario',
            'name.max' => 'Campo nombre solo permite 150 caracteres máximo',

            'last_name.required' => 'Campo primer apellido es necesario',
            'last_name.max' => 'Campo primer apellido solo permite 150 caracteres máximo',

            'age.required' => 'Campo edad es necesario',
            'age.max' => 'Campo edad solo permite 10 caracteres máximo',

            'phone.required' => 'Campo telefono es necesario',
            'phone.max' => 'Campo telefono solo permite 10 caracteres máximo',

            'phone_emergency.required' => 'Campo telefono de emergencia es necesario',
            'phone_emergency.max' => 'Campo telefono de emergencia solo permite 10 caracteres máximo',
        ];
        if ($this->method() == 'PUT') {
            $messages = [
                /* 'identifier.required' => 'Campo identificador es necesario',
                'identifier.max' => 'Campo identificador solo permite 30 caracteres máximo',
                'identifier.unique' => 'El identificador ingresado se encuentra registrado en la base', */

                'name.required' => 'Campo nombre es necesario',
                'name.max' => 'Campo nombre solo permite 150 caracteres máximo',

                'last_name.required' => 'Campo primer apellido es necesario',
                'last_name.max' => 'Campo primer apellido solo permite 150 caracteres máximo',

                'age.required' => 'Campo edad es necesario',
                'age.max' => 'Campo edad solo permite 10 caracteres máximo',

                'phone.required' => 'Campo telefono es necesario',
                'phone.max' => 'Campo telefono solo permite 10 caracteres máximo',

                'phone_emergency.required' => 'Campo telefono de emergencia es necesario',
                'phone_emergency.max' => 'Campo telefono de emergencia solo permite 10 caracteres máximo',

            ];
        }
        return $messages;
    }
}
