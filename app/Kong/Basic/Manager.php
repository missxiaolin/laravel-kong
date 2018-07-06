<?php

namespace App\Micro\Basic;


use GuzzleHttp\Client;
use Exception;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\ServerException;
use GuzzleHttp\Exception\BadResponseException;

class Manager
{

    protected $errorMessage = '网络错误，请稍后再试';

    /**
     *
     * @var \App\Micro\Basic\Request
     */
    protected $request;


    /**
     *
     * @return \App\Micro\Basic\Request
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * 连接后端请求
     * @param $request
     * @param array $paramter
     * @return mixed
     * @throws Exception
     */
    public function connect($request, $paramter = [])
    {

        $this->request = $request;

        $time = $this->request->getTimeOut();

        $client = new Client([
            'base_uri' => $this->getHost(),
            'timeout' => $time,
        ]);

        $data = $this->request->getData();

        $post = [
            'front' => request()->url(),
            'backend' => $this->getHost() . $this->request->getUri(),
            'method' => $request->getMethod(),
            'start' => $this->getTimeNow(),
            'end' => null,
            'request' => $data,
        ];

        $options = [
            'json' => $data,
        ];

        $response = [];
        try {

            if ($this->request->getMethod() == 'GET') {
                $response = $client->get($this->request->getUri());
            } else {
                $response = $client->post($this->request->getUri(), $options);
            }

        } catch (ConnectException $ce) {

            $post['error'] = [
                'errorCode' => $ce->getCode(),
                'errorMessage' => $ce->getMessage(),
                'errorFile' => $ce->getFile(),
                'errorLine' => $ce->getLine(),
            ];
            $post['end'] = $this->getTimeNow();

            app()['micro'] = [
                'errorCode' => 'E50101',
                'errorMessage' => '服务超时',
                'errorServer' => $request->getName(),
            ];

            logger_instance($this->request->getConnectLogName(), $post);

            throw new Exception($this->errorMessage, 500);

        } catch (BadResponseException $be) {

            $post['error'] = [
                'errorCode' => $be->getCode(),
                'errorMessage' => $be->getMessage(),
                'errorFile' => $be->getFile(),
                'errorLine' => $be->getLine(),
            ];
            $post['end'] = $this->getTimeNow();

            app()['micro'] = [
                'errorCode' => 'E50202',
                'errorMessage' => '服务未找到',
                'errorServer' => $this->request->getName(),
            ];

            logger_instance($this->request->getBadLogName(), $post);

            throw new Exception($this->errorMessage, 500);

        } catch (ServerException $se) {

            $post['error'] = [
                'errorCode' => $se->getCode(),
                'errorMessage' => $se->getMessage(),
                'errorFile' => $se->getFile(),
                'errorLine' => $se->getLine(),
            ];
            $post['end'] = $this->getTimeNow();

            app()['micro'] = [
                'errorCode' => 'E50303',
                'errorMessage' => '服务异常',
                'errorServer' => $this->request->getName(),
            ];

            logger_instance($this->request->getServerLogName(), $post);

            throw new Exception($this->errorMessage, 500);

        } catch (Exception $ex) {

            $post['error'] = [
                'errorCode' => $ex->getCode(),
                'errorMessage' => $ex->getMessage(),
                'errorFile' => $ex->getFile(),
                'errorLine' => $ex->getLine(),
            ];
            $post['end'] = $this->getTimeNow();

            app()['micro'] = [
                'errorCode' => 'E50404',
                'errorMessage' => '请求异常',
                'errorServer' => $this->request->getName(),
            ];

            logger_instance($this->request->getResultFailLogName(), $post);

            throw new Exception($this->errorMessage, 500);
        }

        $status = $response->getStatusCode();

        //状态异常
        if ($status != 200) {

            $post['error'] = [
                'errorCode' => 'E50505',
                'errorMessage' => 'HTTP异常',
            ];
            $post['end'] = $this->getTimeNow();

            app()['micro'] = [
                'errorCode' => 'E50505',
                'errorMessage' => 'HTTP状态异常',
                'errorServer' => $this->request->getName(),
            ];

            logger_instance($this->request->getResultFailLogName(), $post);

            throw new Exception($this->errorMessage, 500);
        }


        $body = json_decode($response->getBody(), true);

        $post['end'] = $this->getTimeNow();
        $post['response'] = $body;
        logger_instance($this->request->getResultSucessLogName(), $post);
        return $body;
    }

    /**
     * 获取API接口
     * @throws Exception
     */
    protected function getHost()
    {
        throw new Exception('Method getHost Error');
    }

    /**
     * @return \Illuminate\Config\Repository|mixed
     * @throws Exception
     */
    protected function getConfig()
    {
        $env = env('APP_ENV', null);
        $file = 'backend.' . $env . '.request';
        $config = config($file);
        if (!$config) {
            throw new Exception($config . ' 配置未找到');
        }
        return $config;
    }

    /**
     * 请求时间精确到毫秒级
     * @return string
     */
    protected function getTimeNow()
    {
        $micro = explode('.', microtime(true));
        $time = sprintf("%04d", array_get($micro, 1, 0));
        $time = date('Y-m-d H:i:s.') . $time;
        return $time;
    }

}
