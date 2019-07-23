<?php
/**
 * @create by: 瑞信科技有限公司
 * @author: hanlidong
 * @Time: 2019/7/16 14:50
 * @desc: 商品模型层
 */

namespace app\common\model;

use app\common\utils\Sql;
use think\Db;
use think\Model;

class GoodsModel extends Model
{

    //首页热门商品
    public function hostGoods($lag,$page=1,$pageSize=10){
        if($lag == true){
            //显示三个
            return Sql::_select("goods",['goods_is_host'=>1,'goods_status'=>1],
                    [],'*','goods_create_time desc',3);
        }
        else{
            //显示全部
            $res = Sql::_selectPage("goods",['goods_is_host'=>1,'goods_status'=>1],
                "goods_create_time desc",$pageSize,[],[],"*",$page);
            return $res;
        }
    }

    //获取全部的商品
    public function getAllGoods(){
        //显示全部
        $res = Sql::_select("goods",[],[],'*',"goods_create_time desc");
        return $res;
    }

    //修改商品
    public function updateGoods($data,$goodsId){
        return Sql::_update("goods",['goods_id'=>$goodsId],$data);
    }

    //添加商品
    public function addGoods($data){
        return Sql::_save("goods",$data);
    }

    //根据id获取商品
    public function getGoodsById($goodsId){
        return Sql::_find("goods",['goods_id'=>$goodsId]);
    }

    //删除商品
    public function delGoods($goodsId){
        return Sql::_del("goods",["goods_id"=>$goodsId]);
    }

    //获取二级分类下的所有商品分页显示
    public function getCategoryLev2Goods($categoryId,$page,$pageSize){
        return Db::name('goods')
            ->where(["goods_category_id"=>$categoryId,'goods_status'=>1])
            ->order("goods_create_time desc")
            ->paginate($pageSize,false,['query'=>[],'var_page'=>'page','page'=>$page]);
    }



}