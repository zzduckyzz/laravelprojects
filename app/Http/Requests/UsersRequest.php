<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Lang;
use App\Rules\OldRole;
use App\Rules\GetPathImage;

class UsersRequest extends FormRequest
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
            'name' => 'required | max:191 ',
            'phone' => ['nullable','numeric', 'digits_between:1,12'],
            'roles' => ['nullable', new OldRole],
            'images' => ['nullable', 'image', 'mimes:jpeg,jpg,png', 'max:3072'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => Lang::trans('message_vn.text_required'),
            'name.max' => Lang::trans('message_vn.text_max'),
            'phone.numeric' => Lang::trans('message_vn.text_numeric'),
            'phone.digits_between' => Lang::trans('message_vn.text_max'),
            'images.image' => Lang::trans('message_vn.image_errors'),
            'images.mimes' => Lang::trans('message_vn.image_errors'),
            'images.max' => Lang::trans('message_vn.image_emax_size'),
        ];
    }
}
