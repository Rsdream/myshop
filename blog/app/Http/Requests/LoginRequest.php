<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
     * 注册验证
     * @author  KuangJunwen <[kjwlaravel@163.com]>
     * @return [array] [正则判断]
     */
    public function rules()
    {
        return [
            'username'=>'bail|required|alpha_dash|min:3|max:20',
            'userpass'=>'bail|required|alpha_num|min:6',
        ];
    }

    public function messages()
    {
        return[
            'username.required'=>'用户名为空',
            'username.alpha_dash'=>'只能是字母、数字、破折号-以及下划线_ ',
            'username.min'=>'用户名格式错误',
            'username.max'=>'用户名格式错误',


            'userpass.required'=>'密码为空',
            'userpass.alpha_num'=>'字段必须完全是字母、数字',
            'userpass.min'=>'格式错误',

        ];
    }
}
