
# think-wechat
微信 SDK for thinkphp5.1.x, 基于 [overtrue/wechat](https://github.com/overtrue/wechat)

## 安装方法

### 第一步 使用composer下载SDK

```bash
composer require zzstudio/think-wechat
```

### 第二步 发布配置文件到TP目录

项目根目录执行

```bash
php think wechat:config
```

> 查看 config/wechat.php 这个文件是否存在，如果不存在手动复制一份这个文件 [config.php](https://raw.githubusercontent.com/zz-studio/think-wechat/master/src/config.php) 到 application/config 这个位置

## 使用方法
具体参考手册 [手册](https://easywechat.org/zh-cn/docs/)

TP中使用代码类似

```php
use think\Wechat;

// 公众号
$app = Wechat::officialAccount();

// 小程序
$app = Wechat::miniProgram();

// 开放平台
$app = Wechat::openPlatform();

// 企业微信
$app = Wechat::weWork();

// 微信支付
$app = Wechat::payment();
```

如果有不懂的，可以下面评论。

也欢迎大家在github提交issue和PR
