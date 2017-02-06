<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MeRequest extends FormRequest
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
            'nickname' => 'required|alpha_dash|min:2|max:10',
            'phone' => 'size:11',
            'password' => 'min:5|max:16|regex:/^[a-zA-Z0-9~@#%_]{5,16}$/i',
            'password_confirmation' => 'same:password',
            'email' => 'email',
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
            'nickname.required' => '请填写昵称',
            'nickname.min' => '昵称字数不得少于2',
            'nickname.max' => '昵称字数不得多于10',
            'nickname.alpha_dash' => '昵称包含某些非常规字符，请移除后重试',

            'phone.required' => '请填写手机号码',
            'phone.size' => '国内的手机号码长度为11位',
            'phone.mobile_phone' => '请填写合法的手机号码',
            'phone.unique' => '此手机号码已存在于系统中',

            'password.min' => '密码长度不得少于5',
            'password.max' => '密码长度不得超出16',
            'password.regex' => '密码包含非法字符，只能为英文字母（a-zA-Z）、阿拉伯数字（0-9）与特殊符号（~@#%_）组合',

            'password_confirmation.same' => '2次密码不一致',

            'email.required' => '请填写邮箱地址',
            'email.email' => '请填写正确合法的邮箱地址',
        ];
    }
}
