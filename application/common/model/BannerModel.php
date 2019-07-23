<?php
/**
 * @create by: 瑞信科技有限公司
 * @author: hanlidong
 * @Time: 2019/7/16 13:22
 * @desc: 轮播图模型层
 */

namespace app\common\model;

use app\common\utils\Sql;
use think\Model;

class BannerModel extends Model
{
    //轮播图列表
    public function banners(){
        return Sql::_select("banner",["banner_status"=>1],[],"*","banner_order_sort desc");
    }

    //根据id号获取轮播详情
    public function getBannerById($bannerId){
        return Sql::_find("banner",['banner_id'=>$bannerId]);
    }

    //获取全部的轮播图
    public function bannersAll(){
        return Sql::_select("banner",[],[],"*","banner_order_sort desc");
    }

    //添加轮播图
    public function addBannner($data){
        return Sql::_save("banner",$data);
    }

    //修改轮播图
    public function updateBanner($data,$bannerId)
    {
        return Sql::_update("banner",['banner_id'=>$bannerId],$data);
    }

}