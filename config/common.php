<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
use Predis\Client;


/**
 * Notes: alert打印测试函数
 * Author: 立冬
 * Date: 2018/9/20
 * Time: 11:45
 * @param $var
 * @param bool $flag
 * @param bool $strict
 */
function alert($var, $flag = true, $strict = true)
{
    if (!$strict) {
        if (ini_get('html_errors')) {
            $output = print_r($var, true);
            $output = '<pre>' . htmlspecialchars($output, ENT_QUOTES) . '</pre>';
        } else {
            $output = print_r($var, true);
        }
    } else {
        ob_start();
        var_dump($var);
        $output = ob_get_clean();
        if (!extension_loaded('xdebug')) {
            $output = preg_replace('/\]\=\>\n(\s+)/m', '] => ', $output);
            $output = '<pre>' . htmlspecialchars($output, ENT_QUOTES) . '</pre>';
        }
    }
    if ($flag) {
        echo($output);
        exit;
    } else {
        echo($output);
    }
}

/**
 *获取redis的对象
 */
function get_redis_client()
{
    $redisConfig = config()['redis'];
    return new Client($redisConfig);
}

/**
 * @param null $data
 * @return \think\response\Json
 * 操作成功
 */
function format_success_result($data = null)
{
    return json(['code' => 2000, 'msg' => '操作成功', 'data' => $data]);
}

/**
 * @param int $code
 * @param string $errorMsg
 * @param string $data
 * @return array
 * 失败信息
 */
function format_result($errorMsg, $code, $data = null)
{
    return json(['code' => $code, 'msg' => $errorMsg, 'data' => $data]);
}

/**
 * 过滤接口
 * $str 带表情的字符
 **/
function filter_string($str)
{
    if ($str) {
        $name = $str;
        $name = preg_replace('/\xEE[\x80-\xBF][\x80-\xBF]|\xEF[\x81-\x83][\x80-\xBF]/', '', $name);
        $name = preg_replace('/xE0[x80-x9F][x80-xBF]‘.‘|xED[xA0-xBF][x80-xBF]/S', '?', $name);
        $return = json_decode(preg_replace("#(\\\ud[0-9a-f]{3})#", "", json_encode($name)));
    } else {
        $return = '';
    }
    return $return;
}