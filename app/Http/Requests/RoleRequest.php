<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
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
        $rules = [
            'name' => 'required|alpha_num|min:3|max:20|unique:admin_roles,name',
            'display_name' => 'required|alpha_dash|min:3|max:40',
            'description' => 'max:80',
            'permissions' => 'required',
            'status' => 'required|in:1,2',
        ];
        return $rules;
    }

    /**
     * 自定义验证信息
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => '角色名必须填写',
            'name.max' => '角色名长度不要超出20',
            'name.min' => '角色名长度不得少于3',
            'name.alpha_num' => '角色名只能为英文字母组合',
            'name.unique' => '系统已存在该角色名',
            'display_name.required' => '角色展示名必须填写',
            'display_name.max' => '角色展示名长度不要超出40',
            'display_name.min' => '角色展示名长度不得少于3',
            'display_name.alpha_dash' => '角色展示名必须为常规字符',
            'description.max' => '描述长度不要超出80',
            'permissions.required' => '角色关联权限必选',
            'status.required' => '请选择角色状态',
            'status.in' => '请选择正确的角色状态',
        ];
    }
}
