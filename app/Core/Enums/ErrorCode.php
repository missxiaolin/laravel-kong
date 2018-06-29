<?php
namespace App\Core\Enums;
use xiaolin\Enum\Enum;

class ErrorCode extends Enum
{

    /**
     * @Message('系统错误')
     */
    public static $ENUM_SYSTEM_ERROR = 400;

    /**
     * @Message('CURL接口访问失败')
     */
    public static $ENUM_SYSTEM_CURL_ERROR = 401;

    /**
     * @Message('API 配置不存在')
     */
    public static $ENUM_SYSTEM_API_CONFIG_NOT_EXIST = 402;

    /*
     * @Message('API请求参数非法')
     */
    public static $ENUM_SYSTEM_API_REQUEST_ILLEGAL = 403;

    /**
     * @Message('访问接口超时')
     */
    public static $ENUM_SYSTEM_TIMEOUT = 1000;
}
