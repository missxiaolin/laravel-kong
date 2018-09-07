<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/7/7
 * Time: 下午4:29
 */

namespace App\Kong\Client\Kong\Service\Form;


use Lin\Src\Basic\Form;

class AddForm extends Form
{
    public function rules()
    {
        return [
            'name' => 'required',
            'url' => 'required',
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
            'name' => '名称',
            'url' => '域名',
        ];
    }

    public function validation()
    {
    }
}