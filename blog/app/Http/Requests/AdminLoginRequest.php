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
          'name' => 'required|min:4|max:56|alpha_num|',
          'pass' => 'required|min:6|max:16|alpha_num|',
      ];
    }
    public function messages()
    {
        return [
            'name.required' => '账号不能为空',
            'name.min' => '账号不能少于4个字符',
            'name.max' => '账号不能多于56个字符',
            'alpha_num' => '账号只能是字母,数字,破折号( - )以及下划线( _ )',
            'pass.required' => '密码不能为空',
            'pass.min' => '密码不能少于6位',
            'pass.max' => '密码不能大于16位',
            'pass.alpha_num' => '账号只能是字母,数字,破折号( - )以及下划线( _ )',
        ];
    }
}
