<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminLoginRequest extends FormRequest
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
          'name' => 'required|alpha_num|',
          'pass' => 'required|alpha_num|',
      ];
    }
    public function messages()
    {
        return [
            'name.required' => '账号不能为空',
            'pass.required' => '密码不能为空',
            'pass.alpha_num' => '账号只能是字母,数字,破折号( - )以及下划线( _ )',
        ];
    }
}
