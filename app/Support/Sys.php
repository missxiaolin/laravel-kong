<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/7/20
 * Time: 上午9:39
 */

namespace App\Support;


class Sys
{
    const USER_DISABLE = 0; //禁用
    const USER_NORMAL = 1; //正常

    const ADMIN_USER_SUPER_TYPE = 1; // 超级管理员

    // 角色路由缓存
    const REDIS_KEY_ROLE_ROUTER_CACHE_KEY = 'cache:role:%s:routers';
}