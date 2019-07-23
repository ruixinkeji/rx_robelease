<?php
/**
 * @create by: 瑞信科技有限公司
 * @author: hanlidong
 * @Time: 2019/7/22 14:49
 * @desc: OrderItemModel 门面类
 */

namespace app\common\facade;

use think\Facade;

class OrderItemModel extends Facade
{
    protected static function getFacadeClass()
    {
        return 'app\common\model\OrderItemModel';
    }

}