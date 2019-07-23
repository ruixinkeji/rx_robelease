<?php
/**
 * @create by: 瑞信科技有限公司
 * @author: hanlidong
 * @Time: 2019/7/16 10:56
 * @desc: userModel门面类
 */

namespace app\common\facade;

use think\Facade;

class UserModel extends Facade
{
    protected static function getFacadeClass()
    {
        return 'app\common\model\UserModel';
    }

}