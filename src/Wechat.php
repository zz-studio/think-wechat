<?php
/**
 * +----------------------------------------------------------------------
 * | think-wechat [微信 SDK for thinkphp5, 基于 overtrue/wechat]
 * +----------------------------------------------------------------------
 *  .--,       .--,             | FILE: Wechat.php
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
namespace  think;

use EasyWeChat\Factory;
use think\facade\Config;

/**
 * Class Wechat  微信类
 * @package think\Wechat
 * @method static \EasyWeChat\Factory::officialAccount          officialAccount
 * @method static \EasyWeChat\Factory::miniProgram              miniProgram
 * @method static \EasyWeChat\Factory::openPlatform             openPlatform
 * @method static \EasyWeChat\Factory::weWork                   weWork
 * @method static \EasyWeChat\Factory::payment                  payment
 */
class Wechat
{
    protected static $app = [];

    public static function __callStatic($name, $arguments)
    {
        $options = Config::get('wechat.');
        if (!isset(self::$app[$name])) {
            if (!$options) {
                throw new \InvalidArgumentException("missing wechat config");
            }
            // 合并模块个性配置
            if (is_array($options[$name])) {
                $options = array_merge($options, $options[$name]);
            }
            self::$app[$name] = Factory::$name($options);
        }
        return self::$app[$name];
    }
}