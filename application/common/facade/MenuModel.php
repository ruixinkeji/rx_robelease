<?php
/**
 * @create by: 瑞信科技有限公司
 * @User: hanlidong
 * @Date: 2019/7/15 0015
 * @Time: 22:43
 * @desc: 菜单模型层门面
 */


namespace app\common\facade;


use think\Facade;

class MenuModel extends Facade
{
    protected static function getFacadeClass()
    {
        return 'app\common\model\MenuModel';
    }
}