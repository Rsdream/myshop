<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
     * @author  kjw <[kjwlaravel@163.com]>
     * 正则判断
     * @return [array] [正则判断错误提示]
     */
    public function rules()
    {
        return [
            'uname'      => 'bail|required|min:2|max:20',
            'upass'      => 'bail|required|alpha_num|min:6|max:20',
            'repeatpass' => 'bail|required|alpha_num|min:6|max:20',
            'uphone'     => 'bail|required',
            'phonecode'  => 'bail|required',
            'ucode'      => 'bail|required|alpha_num',
            'check'      => 'accepted',
        ];
    }

    public function messages()
    {
        return [
           'uname.required' => '用户名不能为空',
           'uname.min:2'    => '用户名长度不能小于2个字符',
           'uname.max:20'   => '用户名长度不能大于20个字符',

           'upass.required'  => '密码不能为空',
           'upass.alpha_num' => '字段必须完全是字母、数字',
           'upass.min'       => '密码长度不能小于6个字符',
           'upass.max'       => '密码长度不能大于20个字符',

           'repeatpass.required'  => '确认密码不能为空',
           'repeatpass.alpha_num' => '字段必须完全是字母、数字',
           'repeatpass.min'       => '密码长度不能小于6个字符',
           'repeatpass.max'       => '密码长度不能大于20个字符',

           'uphone.required' => '手机号不能为空',

           'phonecode.required' => '手机验证码不能为空',

           'ucode.required'  => '验证码不能为空',
           'ucode.alpha_num' => '字段必须完全是字母、数字',

           'check.accepted' => '请同意条款',
        ];
    }
}
