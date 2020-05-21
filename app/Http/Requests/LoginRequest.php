<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Lang;

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
            //
            'email' => ['required', 'email', 'max:191'],
            'password' =>['required', 'max:191'],
        ];
    }

    public function messages()
    {
        return [
            'email.required' => Lang::trans('message_vn.text_required'),
            'email.email' => Lang::trans('message_vn.text_email'),
            'email.max' => Lang::trans('message_vn.text_max'),
            'password.required' => Lang::trans('message_vn.text_required'),
            'password.max' => Lang::trans('message_vn.text_max'),
        ];
    }
}
