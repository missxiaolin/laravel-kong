<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Micro\Basic;

use Exception;

class Request {
    
    protected $uri;

    /**
     *
     * @var array 
     */
    protected $data = [];

    /**
     * 请求地址
     * @throws Exception
     */
    public function getUri() {
        return $this->uri;
    }
    
    /**
     * 接口名称
     * @throws Exception
     */
    public function getName(){
        return 'micro';
    }
    
    /**
     * 超时时间
     * @return real
     */
    public function getTimeOut(){
        return 5.0;
    }
    
    /**
     * 请求方式
     * @return string
     */
    public function getMethod(){
        return 'POST';
    }
    
    /**
     * 50x错误
     * @return string
     * @throws Exception
     */
    public function getServerLogName(){
        return $this->getName() . '.server';
    }
    
    /**
     * 40x错误
     * @return string
     * @throws Exception
     */
    public function getBadLogName(){
        return $this->getName() . '.bad';
    }

    /**
     * 连接日志
     * @return string
     * @throws Exception
     */
    public function getConnectLogName(){
        return $this->getName() . '.connect';
    }

    /**
     * 请求失败日志
     * @return string
     * @throws Exception
     */
    public function getResultFailLogName(){
        return $this->getName() . '.fail';
    }

    /**
     * 请求成功日志
     * @return string
     * @throws Exception
     */
    public function getResultSucessLogName(){
        return $this->getName() . '.success';
    }

    /**
     * 忽略的错误类型
     * @return array
     */
    public function getIgnoreErrors(){
        return [];
    }
    
    /**
     * 
     * @param type $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }
    
}
