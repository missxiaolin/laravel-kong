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
     * @Message('非法访问')
     */
    public static $ENUM_ILLEGAL_REQUEST = 704;

    /**
     * @Message('访问接口超时')
     */
    public static $ENUM_SYSTEM_TIMEOUT = 1000;

    /**
     * @Message('kong接口错误')
     */
    public static $ENUM_KONG_API_FAIL = 1001;

    /**
     * @Message('Kong节点不存在，请先配置节点信息')
     */
    public static $ENUM_KONG_NODES_NOT_EXIST = 1002;

    /**
     * @Message('参数错误')
     */
    public static $ENUM_SYSTEM_API_PARAM_ERROR = 1003;

    /**
     * @Message('账号密码错误')
     */
    public static $ENUM_SYSTEM_API_USER_ERROR = 1004;

    /**
     * @Message('账号未登陆')
     */
    public static $ENUM_SYSTEM_API_LOGIN_ERROR = 1005;

    /**
     * @Message('手机号码已注册')
     */
    public static $ENUM_SYSTEM_API_USER_MOBILE_ERROR = 1006;

    /**
     * @Message('用户已注册')
     */
    public static $ENUM_SYSTEM_API_USER_EXIST_ERROR = 1006;

    /**
     * @Message('未找到该用户')
     */
    public static $ENUM_SYSTEM_API_NO_USER_ERROR = 1006;

    /**
     * @Message('用户被禁用')
     */
    public static $ENUM_SYSTEM_API_USER_DISABLE_ERROR = 1007;
}
