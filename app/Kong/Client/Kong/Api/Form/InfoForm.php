<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/7/7
 * Time: 下午8:14
 */

namespace App\Kong\Client\Kong\Api\Form;


use Lin\Src\Basic\Form;

class InfoForm extends Form
{
    public function rules()
    {
        return [
            'id',
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
            'id' => '路由Id',
        ];
    }

    public function validation()
    {
    }
}