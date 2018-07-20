<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/7/7
 * Time: 下午8:14
 */

namespace App\Kong\Client\Kong\Api\Form;

use App\Src\Basic\Form;

class UploadForm extends Form
{
    public function rules()
    {
        return [
            'id' => 'required',
            'name' => 'required',
            'hosts' => 'required',
            'methods' => 'required',
            'uris' => 'required',
            'upstream_url' => 'required',
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
            'id' => 'apiId',
            'name' => '名称',
            'hosts' => '域名',
            'methods' => '发送方式',
            'uris' => '匹配路径',
            'upstream_url' => '转发地址',
        ];
    }

    public function validation()
    {
    }
}