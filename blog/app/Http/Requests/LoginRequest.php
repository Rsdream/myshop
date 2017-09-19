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
            'name'=>'required|alpha_dash|min:3|max:20',
            'pass'=>'required|alpha_num|min:6',
            'phone'=>'required',
            'email'=>'required'
        ];
    }

    public function messages()
    {
        return[
            'name.required'=>'用户名为空',
            'name.alpha_dash'=>'只能是字母、数字、破折号-以及下划线_ ',
            'name.mix'=>'用户名过短',
            'name.max'=>'用户名过长',

            'pass.required'=>'密码为空',
            'pass.alpha_num'=>'字段必须完全是字母、数字',
            'pass.mix'=>'密码过短',

            'phone.required'=>'手机号为空',

            'email.required'=>'邮箱为空'

        ];
    }
}
