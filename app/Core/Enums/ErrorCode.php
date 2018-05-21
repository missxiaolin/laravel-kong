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

    /**
     * @Message('DB环境配置不存在')
     */
    public static $ENUM_SYSTEM_DATABASE_CONFIG_NOT_EXIST = 1001;

    /**
     * @Message('短信服务配置不存在')
     */
    public static $ENUM_SYSTEM_SMS_CONFIG_NOT_EXIST = 1002;

    /**
     * @Message('短信服务初始化失败')
     */
    public static $ENUM_SYSTEM_SMS_INIT_ERROR = 1003;

    /**
     * @Message('短信模板不存在')
     */
    public static $ENUM_SYSTEM_SMS_TEMPLATES_NOT_EXIST = 1004;

    /**
     * @Message('短信发送频率太高')
     */
    public static $ENUM_SYSTEM_SMS_SEND_FREQUENTLY = 1005;

    /**
     * @Message('短信验证码生成失败')
     */
    public static $ENUM_SYSTEM_SMS_CODE_CREATE_ERROR = 1006;

    /**
     * @Message('发送验证码失败')
     */
    public static $ENUM_SYSTEM_SMS_SEND_CODE_ERROR = 1007;

    /**
     * @Message('调用内部服务失败')
     */
    public static $ENUM_SYSTEM_SPRING_CLOUD_RESPONSE_FAILED = 1008;

    /**
     * @Message('调用内部服务超时')
     */
    public static $ENUM_SYSTEM_SPRING_CLOUD_REQUEST_TIMEOUT = 1009;
}
