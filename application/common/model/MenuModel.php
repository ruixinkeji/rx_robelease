<?php
/**
 * @create by: 瑞信科技有限公司
 * @User: hanlidong
 * @Date: 2019/7/15 0015
 * @Time: 22:38
 * @desc: 菜单模型层
 */


namespace app\common\model;


use app\common\utils\Sql;
use think\Model;

class MenuModel extends Model
{

    //设置后台菜单
    public function setMenu(){
        $top_menu = $this->getSubList(0);
        $menu = [];
        foreach ($top_menu as $t) {
            $t['sub_menu'] = $this->getSubList($t['id']);
            array_push($menu, $t);
        }
        return $menu;
    }

    /*
     * 根据pid获取菜单
     * */
    public function getSubList($pid)
    {
        $menuarr = Sql::_select('menu',["hide"=>0,"parent_id"=>$pid],[],'*',"order_sort asc");
        return $menuarr;
    }


}