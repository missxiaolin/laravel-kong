<?php

namespace App\Src\Basic;

class Filter
{

    /**
     *
     * @var type
     */
    protected $data = [];

    /**
     *
     * @var \Illuminate\Http\Request
     */
    protected $request;

    /**
     * 构造函数
     */
    public function __construct()
    {
        $this->request = request();
        $this->data = $this->request->all();
        $this->build();
        $this->removeExpand();
    }

    /**
     * 获取数据
     * @return type
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * 构建
     */
    protected function build()
    {

    }
    
    /**
     * 移除多余参数
     */
    protected function removeExpand()
    {
        unset($this->data['expand']);
    }
}
