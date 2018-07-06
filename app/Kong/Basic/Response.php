<?php

namespace App\Micro\Basic;

class Response
{

    public $code = 0;

    public $request;

    public $response = [];

    protected function doProcess($code, $request, $response)
    {

        $this->code = $code;
        $this->request = $request;

        if ($code == 200) {
            $this->response = array_get($response, 'model', []);
        } else {
            $this->response = $response;
        }

        return $this;
    }

    protected function doProcessBody($code, $request, $response)
    {

        $this->code = $code;
        $this->request = $request;

        if ($code == 200) {
            $this->response = array_get($response, 'body', []);
        } else {
            $this->response = $response;
        }

        return $this;
    }

    /**
     * 发送请求
     * @return array
     */
    public function sendResponse()
    {

        if ($this->code == 200) {
            return $this->success([], $this->response);
        }

        if ($this->code == 300) {
            return $this->error([], $this->response);
        }

        if ($this->code == 500) {
            return $this->fail([], $this->response);
        }
    }

    /**
     * 请求成功
     * @param array $request
     * @param array $response
     * @return array
     */
    public function success($request = [], $response = [])
    {
        return api_response($response, 0);
    }


    /**
     * 请求失败
     * @param array $request
     * @param array $response
     * @return array
     */
    public function fail($request = [], $response = [])
    {
        $message = array_get($response, 'errorMessage', null);
        return api_response($response, 500, $message);
    }

    /**
     * 缺少参数
     * @param array $request
     * @param array $response
     * @return array
     */
    public function error($request = [], $response = [])
    {
        return api_response($response, 300, '缺少参数');
    }

    /**
     * @param array $request
     * @param array $response
     * @return array
     */
    public function callback($request = [], $response = [])
    {
        return $this->success($request, $response);
    }

}
