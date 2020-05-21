<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Lang;

class CategoriesRequest extends FormRequest
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
            //
            'name' => 'required | max:191 |unique:categories,name,'.$this->id,
            'position' => ['nullable','numeric', 'min:0'],
        ];

    }

    public function messages()
    {
        return [
            'name.required' => Lang::trans('message_vn.text_required'),
            'name.max' => Lang::trans('message_vn.text_max'),
            'name.unique' => Lang::trans('message_vn.text_unique'),
            'position.min' => Lang::trans('message_vn.min_number'),
        ];
    }
}
