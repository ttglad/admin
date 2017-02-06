<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required|min:4|max:10|alpha_dash|unique:admin_users,name',
            'nickname' => 'required|alpha_dash|min:2|max:10',
            'phone' => 'size:11',
            'password' => 'required|min:5|max:16|regex:/^[a-zA-Z0-9~@#%_]{5,16}$/i',
            'password_confirmation' => 'required|same:password',
            'email' => 'email',
            'role' => 'required|exists:admin_roles,id',
        ];
    }

    /**
     * 自定义验证信息
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.unique' => '此登录名已存在，请尝试其它名字组合',
            'name.required' => '请填写登录名',
            'name.max' => '登录名过长，长度不得超出10',
            'name.min' => '登录名过短，长度不得少于4',
            'name.eng_alpha_num' => '登录名只能阿拉伯数字与英文字母组合',
            'name.unique' => '此登录名已存在，请尝试其它名字组合',

            'nickname.required' => '请填写昵称',
            'nickname.min' => '昵称字数不得少于2',
            'nickname.max' => '昵称字数不得多于10',
            'nickname.alpha_dash' => '昵称包含某些非常规字符，请移除后重试',

            'phone.required' => '请填写手机号码',
            'phone.size' => '国内的手机号码长度为11位',
            'phone.mobile_phone' => '请填写合法的手机号码',
            'phone.unique' => '此手机号码已存在于系统中',

            'password.required' => '请填写登录密码',
            'password.min' => '密码长度不得少于5',
            'password.max' => '密码长度不得超出16',
            'password.regex' => '密码包含非法字符，只能为英文字母（a-zA-Z）、阿拉伯数字（0-9）与特殊符号（~@#%_）组合',

            'password_confirmation.required' => '请填写确认密码',
            'password_confirmation.same' => '2次密码不一致',

            'email.required' => '请填写邮箱地址',
            'email.email' => '请填写正确合法的邮箱地址',

            'role.required' => '请选择角色（用户组）',
            'role.exists' => '系统不存在该角色（用户组）',
        ];
    }
}
