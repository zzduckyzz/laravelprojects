<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Lang;

class RegisterRequest extends FormRequest
{
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
            'name' =>['required','max:191'],
            'email' => 'required | email | unique:users,email,'.$this->id,
            'password' =>['required'],
            'rpassword' =>['required', 'same:password'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => Lang::trans('message_vn.text_required'),
            'email.required' => Lang::trans('message_vn.text_required'),
            'email.email' => Lang::trans('message_vn.text_email'),
            'email.max' => Lang::trans('message_vn.text_max'),
            'password.required' => Lang::trans('message_vn.text_required'),
            'rpassword.required' => Lang::trans('message_vn.text_required'),
            'rpassword.same' => 'Mật khẩu không trùng khớp',
        ];
    }
}
