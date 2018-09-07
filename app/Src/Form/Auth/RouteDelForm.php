<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/7/27
 * Time: 下午3:35
 */

namespace App\Src\Form\Auth;

use Lin\Src\Basic\Form;

class RouteDelForm extends Form
{
    public function rules()
    {
        return [
            'id' => 'required',
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
            'id' => '规则Id',
        ];
    }

    public function validation()
    {
    }
}