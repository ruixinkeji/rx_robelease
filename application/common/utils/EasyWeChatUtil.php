<?php
/**
 * @create by: 瑞信科技有限公司
 * @author: hanlidong
 * @Time: 2019/7/16 11:19
 * @desc: 微信工具类
 */

namespace app\common\utils;

use EasyWeChat\Factory;

final class EasyWeChatUtil
{
    //创建小程序工具类
    public static function getApplet()
    {
        $config = [
            'app_id' => config('appletWeChat')['appid'],
            'secret' => config('appletWeChat')['secret'],
            // 下面为可选项
            // 指定 API 调用返回结果的类型：array(default)/collection/object/raw/自定义类名
            'response_type' => 'array',
            'log' => [
                'level' => 'debug',
                'file' => config('log_path')['wechat_path'],
            ],
        ];
        $apps = Factory::miniProgram($config);
        return $apps;
    }

    //创建公众号工具类
    public static function getOfficialAccounts()
    {
        $config = [
            // ...
            'app_id' => config('webOAuthWX')['appID'],
            'secret' => config('webOAuthWX')['appSecret'],
            // 指定 API 调用返回结果的类型：array(default)/collection/object/raw/自定义类名
            'response_type' => 'array',
            'oauth' => [
                'scopes' => ['snsapi_login'],
                'callback' => '/admin/index/callback',
            ],
            // ..
        ];
        $app = Factory::officialAccount($config);
        return $app;
    }

    //创建支付对象
    public static function getPayMentObject()
    {
        $config = [
            // 必要配置
            'app_id' => config('webOAuthWX')['appID'],
            'mch_id' => 'your-mch-id',
            'key' => 'key-for-signature',   // API 密钥
            // 如需使用敏感接口（如退款、发送红包等）需要配置 API 证书路径(登录商户平台下载 API 证书)
            'cert_path' => 'path/to/your/cert.pem', // XXX: 绝对路径！！！！
            'key_path' => 'path/to/your/key',      // XXX: 绝对路径！！！！
            'notify_url' => '默认的订单回调地址',     // 你也可以在下单时单独设置来想覆盖它
        ];
        $app = Factory::payment($config);
        return $app;
    }


}