<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Lang;

class PermissionsRequest extends FormRequest
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
            'name' => 'required | max:191 | unique:permissions,name,'.$this->id,
            'display_name' => ['nullable', 'max:191'],
            'description' => ['nullable', 'max:191'],
            'group_permission_id' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => Lang::trans('message_vn.text_required'),
            'name.unique' => Lang::trans('message_vn.text_unique'),
            'name.max' => Lang::trans('message_vn.text_max'),
            'display_name.max' => Lang::trans('message_vn.text_max'),
            'description.max' => Lang::trans('message_vn.text_max'),
            'group_permission_id.required' => Lang::trans('message_vn.text_required'),
        ];
    }
}
