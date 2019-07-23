<?php
/**
 * @create by: 瑞信科技有限公司
 * @author: hanlidong
 * @Time: 2019/7/22 14:55
 * @desc: OrderShippingModel门面类
 */

namespace app\common\facade;

use think\Facade;

class OrderShippingModel extends Facade
{
    protected static function getFacadeClass()
    {
        return 'app\common\model\OrderShippingModel';
    }
}