<?php
/**
 * @create by: 瑞信科技有限公司
 * @User: hanlidong
 * @Date: 2019/7/15 0015
 * @Time: 21:14
 * @desc: 图形验证码配置
 */
return [
    // 验证码字符集合
    'codeSet' => '2345678abcdefhijkmnpqrstuvwxyzABCDEFGHJKLMNPQRTUVWXY',
    // 验证码字体大小(px)
    'fontSize' => 20,
    // 是否画混淆曲线
    'useCurve' => false,
    // 验证码图片高度
    'imageH' => 40,
    // 验证码图片宽度
    'imageW' => 150,
    // 验证码位数
    'length' => 4,
    // 验证成功后是否重置
    'reset' => true
];
