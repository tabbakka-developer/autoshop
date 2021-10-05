<?php

namespace App\Http\Requests\CarsData;

use Illuminate\Foundation\Http\FormRequest;

class ListMakersRequest extends FormRequest
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
            'limit' => 'integer|min:1|max:10000',
        ];
    }
}