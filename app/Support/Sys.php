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

    const ADMIN_ROUTER_SEARCH_TYPE_ALL = 0; // 所有路由
    const ADMIN_ROUTER_SEARCH_TYPE_BOUND = 1; // 已绑定的路由

    // 路由类型
    const ADMIN_ROUTER_SYSTEM_TYPE = 1; // 系统类型
    const ADMIN_ROUTER_NORMAL_TYPE = 0; // 自定义类型

    // 路由规则
    const ADMIN_ROUTE_MODULE_PID = 0;
    const ADMIN_ROUTE_PAGES_PID = 1;
    const ADMIN_ROUTE_BTN_PID = 2;
}