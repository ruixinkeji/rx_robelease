<?php
/**
 * @create by: 瑞信科技有限公司
 * @author: hanlidong
 * @Time: 2019/7/16 14:59
 * @desc: goodsModel门面类
 */

namespace app\common\facade;


use think\Facade;

class GoodsModel extends Facade
{
    protected static function getFacadeClass()
    {
        return 'app\common\model\GoodsModel';
    }

}