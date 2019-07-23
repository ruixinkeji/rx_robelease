<?php
/**
 * @create by: 瑞信科技有限公司
 * @author: hanlidong
 * @Time: 2019/7/17 13:44
 * @desc: 商品验证器
 */

namespace app\common\validate;

use think\Validate;

class Goods extends Validate
{
    protected $rule = [
        'goods_name|商品名' => 'require',
        'goods_num|数量'=>'number',
        'goods_current_price|价格'=>'require',
        'goods_lease_time|租赁时间'=>'number',

    ];


}