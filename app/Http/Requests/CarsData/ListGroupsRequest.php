<?php

namespace App\Http\Requests\CarsData;

use Illuminate\Foundation\Http\FormRequest;

class ListGroupsRequest extends FormRequest
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
            'car_maker_id' => 'required|exists:car_makers,id',
            'limit' => 'integer|min:1|max:10000'
        ];
    }
}
