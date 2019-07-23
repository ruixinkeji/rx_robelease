<?php
/**
 * @create by: 瑞信科技有限公司
 * @author: hanlidong
 * @Time: 2019/7/16 15:32
 * @desc: 随机数生成工具类
 */
namespace app\common\utils;


final class RandUtil
{

    public function randStr()
    {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDE".time()."FGHIJKLMNOPQRSTUVWXYZ0123456789";
        $randStr = "";
        for ($i = 0; $i < 20; $i++) {
            $randStr .= $chars[mt_rand(0, strlen($chars) - 1)];
        }
        return $randStr;
    }
    public function randStr2($l)
    {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDE".time()."FGHIJKLMNOPQRSTUVWXYZ0123456789";
        $randStr = "";
        for ($i = 0; $i < $l; $i++) {
            $randStr .= $chars[mt_rand(0, strlen($chars) - 1)];
        }
        return $randStr;
    }

}