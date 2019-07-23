<?php
/**
 * @create by: 瑞信科技有限公司
 * @author: hanlidong
 * @Time: 2019/7/22 9:40
 * @desc: MerchantModel门面
 */

namespace app\common\facade;

use think\Facade;

class MerchantModel extends Facade
{
    protected static function getFacadeClass()
    {
        return 'app\common\model\MerchantModel';
    }
}