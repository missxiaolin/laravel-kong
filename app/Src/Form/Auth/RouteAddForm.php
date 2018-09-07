<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/7/27
 * Time: 下午2:13
 */

namespace App\Src\Form\Auth;

use Lin\Src\Basic\Form;

class RouteAddForm extends Form
{
    public function rules()
    {
        return [
            'name' => 'required',
            'code' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute必填。',
        ];
    }

    public function attributes()
    {
        return [
            'name' => '规则名称',
            'code' => '编码',
        ];
    }

    public function validation()
    {
    }
}