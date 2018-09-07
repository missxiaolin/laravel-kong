<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/7/7
 * Time: 下午8:14
 */

namespace App\Kong\Client\Kong\Consumer\Form;

use Lin\Src\Basic\Form;

class UploadForm extends Form
{
    public function rules()
    {
        return [
            'id' => 'required',
            'username' => 'required',
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
            'id' => '消费者Id',
            'username' => '用户名称',
        ];
    }

    public function validation()
    {
    }
}