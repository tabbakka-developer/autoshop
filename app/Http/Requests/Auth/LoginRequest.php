<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
        return [
            'email' => 'email|required_without:phone|'.
                'regex:/^[A-Za-z0-9][A-Za-z0-9\._-]*@[A-Za-z0-9][A-Za-z0-9_-]*(\.[A-Za-z0-9_-]+)+$/i',
            'phone' => 'string|required_without:email',
            'password' => 'required|min:6|max:16',
            'remember' => 'bool|nullable'
        ];
    }
}
