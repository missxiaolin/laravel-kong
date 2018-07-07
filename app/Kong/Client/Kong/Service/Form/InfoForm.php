<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/7/7
 * Time: 下午4:29
 */

namespace App\Kong\Client\Kong\Service\Form;


use App\Src\Basic\Form;

class InfoForm extends Form
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
            'id' => '服务Id',
        ];
    }

    public function validation()
    {
    }
}