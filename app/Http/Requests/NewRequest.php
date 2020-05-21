<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Lang;


class NewRequest extends FormRequest
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
            'title' => 'required | max:191 ',
            'categori_id' => 'required',
            'images' => ['nullable', 'image', 'mimes:jpeg,jpg,png', 'max:3072'],
        ];
    }

    public function messages()
    {
        return [
            'title.required' => Lang::trans('message_vn.text_required'),
            'title.max' => Lang::trans('message_vn.text_max'),
            'categori_id.required' => Lang::trans('message_vn.text_required'),
            'images.required' => Lang::trans('message_vn.text_required'),
            'images.image' => Lang::trans('message_vn.image_errors'),
            'images.mimes' => Lang::trans('message_vn.image_errors'),
            'images.max' => Lang::trans('message_vn.image_emax_size'),
        ];
    }
}
