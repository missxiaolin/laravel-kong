<?php

if (!function_exists('api_response')) {

    /**
     * json返回
     * @param $data
     * @param string $code
     * @param string $msg
     * @return \Illuminate\Http\JsonResponse
     */
    function api_response($data, $code = '0', $msg = 'ok')
    {
        $json = [
            'data' => $data,
            'code' => $code,
            'message' => $msg,
            'time' => (string)time(),
            '_ut' => (string)round(microtime(TRUE) - $_SERVER['REQUEST_TIME_FLOAT'], 5),
        ];

        $headers = implode(',', config('domain.request.headers'));

        return response()->json($json)->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Credentials', 'true')
            ->header('Access-Control-Allow-Headers', $headers);
    }
}

/**
 *
 * @param string $errorMessage
 * @param string $errorCode
 * @param array $error
 * @return json
 */
function response_error($errorMessage, $errorCode, $error = [])
{
    return api_response([], $errorCode, $errorMessage);
}

if (!function_exists('generate_unique_id')) {
    /**
     * 生成唯一ID
     * @return string
     */
    function generate_unique_id($index = null)
    {
        $token = isset($index) ? $index . ':' : '';
        return $token . str_replace(".", '', uniqid(str_random(20), true));
    }
}

if (!function_exists('api_error')) {

    function api_error($code = 0, $message = null, Throwable $previous = null)
    {
        if ($message === null) {
            $message = \App\Core\Enums\ErrorCode::getMessage($code);
            return api_response([], $code, $message);
        }
    }
}

if (!function_exists('logger_instance')) {

    /**
     * 异步写日志
     *
     * @param  string $name
     * @param  string $message
     * @param  array $context
     * @return \Illuminate\Contracts\Logging\Log|null
     */
    function logger_instance($name, $message = null, $context = [])
    {
        $logger = [
            'body' => $message,
            'context' => $context,
        ];

        logger_local($name, json_encode_ori($logger));
    }
}

if (!function_exists('json_encode_ori')) {

    /**
     * JSON
     *
     * @param  string $name
     * @param  string $message
     * @return \Illuminate\Contracts\Logging\Log|null
     */
    function json_encode_ori($message)
    {
        if (env('APP_ENV') == 'production') {
            return json_encode($message, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
        }
        return json_encode($message, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }

}

if (!function_exists('logger_local')) {
    /**
     * Log a debug message to the logs.
     *
     * @param  string $name
     * @param  string $message
     * @param  array $context
     * @return \Illuminate\Contracts\Logging\Log|null
     */
    function logger_local($name, $message = null, array $context = [])
    {

        if (is_null($message)) {
            return app('logger_local')->getLogger($name);
        }

        return app('logger_local')->getLogger($name)->debug($message, $context);
    }
}

if (!function_exists('logger_factory')) {

    /**
     * Log a debug message to the logs.
     *
     * @param  string $name
     * @param  string $message
     * @param  array $context
     * @return \Illuminate\Contracts\Logging\Log|null
     */
    function logger_factory($name, $message = null, array $context = [])
    {

        if (is_null($message)) {
            return app('logger_factory')->getLogger($name);
        }

        return app('logger_factory')->getLogger($name)->debug($message, $context);
    }

}