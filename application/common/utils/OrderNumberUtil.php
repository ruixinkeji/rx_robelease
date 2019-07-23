<?php
/**
 * @create by: 瑞信科技有限公司
 * @author: hanlidong
 * @Time: 2019/7/22 14:22
 * @desc: 订单号生成工具类
 */

namespace app\common\utils;

final class OrderNumberUtil
{

    //19位订单号随机生成
    public static function getOrderNumber(){
        $danhao = date('YmdHis') . str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT);
        return $danhao;
    }

}