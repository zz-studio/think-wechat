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

    /**
     * 静态调用魔术方法
     * @param $name
     * @param $arguments
     * @return mixed
     */
    public static function __callStatic($name, $arguments)
    {
        if (!isset(self::$app[$name])) {
            // 查看是否有个性配置
            $options = [];
            if (isset($arguments[0]) && is_array($arguments[0])) {
                $options = $arguments[0];
            }
            // 使用自定义配置
            if (empty($options)) {
                $options = Config::get('wechat.');
                if (!$options) {
                    throw new \InvalidArgumentException("missing wechat config");
                }
                if (isset($options[$name]) && is_array($options[$name])) {
                    // 合并模块个性配置
                    $options = array_merge($options, $options[$name]);
                }
            }
            self::$app[$name] = Factory::$name($options);
        }
        return self::$app[$name];
    }
}
