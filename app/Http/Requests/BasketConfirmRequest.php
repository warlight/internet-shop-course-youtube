<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BasketConfirmRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'min:8', 'max:255'],
            'email' => ['email', 'max:255'],
        ];

        if (!auth()) {
            $rules['email'] .= ", 'required'";
        }

        return $rules;

    }

    public function messages()
    {
        return [
            'name.required' => 'Поле не должно оставаться пустым',
            'name.string' => 'Поле должно быть строкой',
            'name.max' => 'Максимальная длина не более 255 символов',
            'phone.required' => 'Поле не должно оставаться пустым',
            'phone.min' => 'Минимальная длина не менее 8 символов',
            'phone.max' => 'Максимальная длина не более 255 символов',
            'email.required' => 'Поле не должно оставаться пустым',
            'email.email' => 'Поле содержит некорректный email',
            'email.max' => 'Максимальная длина не более 255 символов',
        ];
    }
}
