<?php
/**
 * @create by: 瑞信科技有限公司
 * @author: hanlidong
 * @Time: 2019/7/18 14:12
 * @desc: roleModel模型层门面类
 */

namespace app\common\facade;

use think\Facade;

class RoleModel extends Facade
{

    protected static function getFacadeClass()
    {
        return 'app\common\model\RoleModel';
    }

}