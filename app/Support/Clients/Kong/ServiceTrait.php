<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/6/29
 * Time: 下午2:06
 */

namespace App\Support\Clients\Kong;


trait ServiceTrait
{
    /**
     * @param $name
     * @param $url
     * @return mixed
     */
    public function add($name, $url)
    {
        $params = [
            'name' => $name,
            'url' => $url,
        ];
        return $this->post('/services/', [
            'form_params' => $params,
        ]);
    }

    /**
     * @return mixed
     */
    public function services()
    {
        return $this->get('/services/');
    }
}