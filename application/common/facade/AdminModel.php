<?php
/**
 * @create by: 瑞信科技有限公司
 * @User: hanlidong
 * @Date: 2019/7/15 0015
 * @Time: 21:56
 * @desc: admin模型层门面
 */


namespace app\common\facade;


use think\Facade;

class AdminModel extends Facade
{
    protected static function getFacadeClass()
    {
        return 'app\common\model\AdminModel';
    }
}