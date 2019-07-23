<?php
/**
 * @create by: 瑞信科技有限公司
 * @author: hanlidong
 * @Time: 2019/7/16 13:44
 * @desc: 商品的分类
 */

namespace app\common\model;

use app\common\utils\Sql;
use think\Db;
use think\Model;

class CategoryModel extends Model
{

    //商品的分类
    public function category($pid=0){
        return Sql::_select("category",
            ['category_parent_id'=>$pid,'category_status'=>1],
            [],"*","category_order_sort asc");
    }

    //根据首页的一级分类获取商品展示
    public function categoryLev1Goods($categoryLev1Id){
        if($categoryLev1Id == 0){
            //展示全部的
            return Sql::_select("goods",['goods_status'=>1,],[],
                "*","goods_create_time desc",3);
        }
        //展示一级分类下的所有子分类的所有商品
        $categoryLev2 = $this->category($categoryLev1Id);
        //获取全部的二级分类下的商品
        $resData = [];
        foreach ($categoryLev2 as $value){
            $res = Sql::_select("goods",['goods_status'=>1,'goods_category_id'=>$value['category_id']],[],
                "*","goods_create_time desc");
            if(!empty($res)){
                foreach ($res as $re){
                    array_push($resData,$re);
                }
            }
        }
        if(!empty($resData)){
            if(count($resData) > 3){
                $temp=array_rand($resData,3);
                //重组数组
                foreach($temp as $val){
                    $data_last[]=$resData[$val];
                }
                return $data_last;
            }
            return $resData;
        }
        return [];
    }

    //根据分类id获取分类
    public function getCategoryById($categoryId){
        return Sql::_find("category",
            ['category_id'=>$categoryId],
            "*");
    }

    //获取全部的二级分类
    public function getCategoryLev2(){
        return Db::name('category')
                ->where("category_parent_id",'>',0)
                ->where("category_status",1)
                ->select();
    }

    //获取一级和二级全部分类
    public function getCategory(){
        $categoryLev1 = Sql::_select("category",
            ['category_parent_id'=>0],
            [],"*","category_order_sort asc");
        $data = [];
        if(!empty($categoryLev1)){
            foreach ($categoryLev1 as $value){
                $categoryLev2 = Sql::_select("category",
                    ['category_parent_id'=>$value['category_id']],
                    [],"*","category_order_sort asc");
                if(!empty($categoryLev2)){
                    $value['categoryLev2'] = $categoryLev2;
                }else{
                    $value['categoryLev2'] = [];
                }
                array_push($data,$value);
            }
        }
        return $data;
    }

    //添加商品分类
    public function addCategory($data){
        return Sql::_save("category",$data);
    }

    //修改分类
    public function updateCategory($data,$categoryId){
        return Sql::_update("category",['category_id'=>$categoryId],$data);
    }

    //根据分类名字获取判断分类名字是否已经存在
    public function exitCateName($categoryName){
        $res = Sql::_find("category",['category_name'=>$categoryName]);
        if($res>0){
            return true;
        }
        return false;
    }





}