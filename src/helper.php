<?php
/**
 * +----------------------------------------------------------------------
 * | think-wechat [微信 SDK for thinkphp5, 基于 overtrue/wechat]
 * +----------------------------------------------------------------------
 *  .--,       .--,             | FILE: helper.php
 * ( (  \.---./  ) )            | AUTHOR: byron sampson
 *  '.__/o   o\__.'             | EMAIL: xiaobo.sun@qq.com
 *     {=  ^  =}                | QQ: 150093589
 *      >  -  <                 | WECHAT: wx5ini99
 *     /       \                | DATETIME: 2018/5/15
 *    //       \\               |
 *   //|   .   |\\              |
 *   "'\       /'"_.-~^`'-.     |
 *      \  _  /--'         `    |
 *    ___)( )(___               |-----------------------------------------
 *   (((__) (__)))              | 高山仰止,景行行止.虽不能至,心向往之。
 * +----------------------------------------------------------------------
 * | Copyright (c) 2017 http://www.zzstudio.net All rights reserved.
 * +----------------------------------------------------------------------
 */

\think\Console::addDefaultCommands([
    "\\think\\wechat\\command\\SendConfig"
]);

if (!function_exists('wechat')) {
    /**
     * @param $name
     * @return mixed
     */
    function wechat($name)
    {
        return call_user_func([\think\Wechat::class, $name]);
    }
}