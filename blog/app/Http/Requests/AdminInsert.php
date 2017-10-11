<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminInsert extends FormRequest
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
            'uid' => 'bail|required|min:6,max:16|alpha_dash',
            'pass' => 'bail|required|min:6,max:26|alpha_dash',
            'name' => 'required',
            'sex' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'address' => 'required'
        ];
    }

    public function messages()
    {
        return [
           'uid.required' => '请输入账号',
           'uid.alpha_dash' => '账号只能是数字、字母、下划线的组合',
           'uid.min' => '账号最短为6位',
           'uid.max' => '账号最长为16位',
           'name.required' => '请输入用户名',
           'pass.required' => '请输入密码',
           'pass.min'  => '密码最短6位',
           'pass.max'  => '密码最长26位',
           'pass.alpha_dash' => '密码只能是数字、字母、下划线的组合',
           'sex.required' => '请选择性别',
           'phone.required' => '请输入手机号码',
           'email.required' => '请输入邮箱',
           'email.email' => '请输入正确的邮箱',
           'address.required' => '请填写地址'
        ];
    }
}
