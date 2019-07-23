<?php
/**
 * @create by: 瑞信科技有限公司
 * @author: hanlidong
 * @Time: 2019/7/16 16:06
 * @desc: 商品管理的控制层
 */

namespace app\admin\controller;

use app\common\controller\AdminController;
use app\common\facade\CategoryModel;
use app\common\facade\GoodsModel;

class Goods extends AdminController
{

    //获取商品列表
    public function lists()
    {
        if (IS_GET) {
            //商品列表
            $data = [];
            $goods = GoodsModel::getAllGoods();
            if (!empty($goods)) {
                foreach ($goods as $good) {
                    $categoryId = $good['goods_category_id'];
                    $good['goods_img'] = json_decode($good['goods_img']);
                    $category = CategoryModel::getCategoryById($categoryId);
                    if (!empty($category)) {
                        $newGoods = array_merge($good, $category);
                        array_push($data, $newGoods);
                    }
                }
            }
        }
        return view("goods-list", ["goods" => $data]);
    }

    //添加商品
    public function add()
    {
        //获取产品分类
        $categoryLev1 = CategoryModel::category();
        $cateData = [];
        foreach ($categoryLev1 as $cateLe1) {
            $cId = $cateLe1['category_id'];
            $categoryLev2 = CategoryModel::category($cId);
            $cateLe1['categoryLev2'] = $categoryLev2;
            array_push($cateData, $cateLe1);
        }
        if (IS_POST) {
            $params = $this->param;
            if ($params['goods_category_id'] == 0) return format_result("商品分类必选！", 2001);
            if ($params['imgUrl'] == null || $params['imgUrl'] == '') return format_result("商品图片必传！", 2001);
            if ($params['goods_num'] < 0) return format_result("商品数量必须大于0！", 2001);
            if ($params['goods_lease_time'] < 0) return format_result("租赁时间必须大于0！", 2001);
            $editorValue = $params['editorValue'];
            //载入商品验证器
            $validate = new \app\common\validate\Goods();
            if (!$validate->check($params)) {
                return format_result($validate->getError(), 2001);
            }
            //验证通过加入数据库
            //商品图片的url地址数组
            $imgs = explode(",", $params['imgUrl']);
            //默认第一个为封面
            $cover = $imgs[0];
            unset($params['imgUrl']);//去掉数据库不同
            unset($params['/admin/goods/add_html']);//去掉数据库不同
            unset($params['editorValue']);//去掉数据库不同
            $params['goods_cover'] = $cover;
            $params['goods_img'] = stripcslashes(json_encode($imgs));//去掉反斜线
            $params['goods_create_time'] = time();
            $params['goods_update_time'] = time();
            $params['goods_desc'] = $editorValue;
            $params['goods_original_price'] = $params['goods_current_price'];
            //存入数据库
            $res = GoodsModel::addGoods($params);
            if ($res > 0) {
                return format_success_result();
            }
            return format_result("商品添加失败！", 2001);
        }
        return view("goods-add", ['category' => $cateData]);
    }

    //商品的下架
    public function stop()
    {
        if (IS_GET) {
            $goodsId = input('goodsId');
            GoodsModel::updateGoods(['goods_status' => 0], $goodsId);
            return format_success_result();
        }
    }

    //商品上架
    public function start()
    {
        if (IS_GET) {
            $goodsId = input('goodsId');
            GoodsModel::updateGoods(['goods_status' => 1], $goodsId);
            return format_success_result();
        }
    }

    //修改商品
    public function edit()
    {
        if (IS_GET) {
            $goodsId = input('goodsId');
            $goods = GoodsModel::getGoodsById($goodsId);
            //获取商品分类
            $categoryLev1 = CategoryModel::category();
            $cateData = [];
            foreach ($categoryLev1 as $cateLe1) {
                $cId = $cateLe1['category_id'];
                $categoryLev2 = CategoryModel::category($cId);
                $cateLe1['categoryLev2'] = $categoryLev2;
                array_push($cateData, $cateLe1);
            }
        }
        if (IS_POST) {
            $params = $this->param;
            $goods_id = $params['goods_id'];
            if ($params['goods_category_id'] == 0) return format_result("商品分类必选！", 2001);
            if ($params['imgUrl'] == null || $params['imgUrl'] == '') return format_result("商品图片必传！", 2001);
            if ($params['goods_num'] < 0) return format_result("商品数量必须大于0！", 2001);
            if ($params['goods_lease_time'] < 0) return format_result("租赁时间必须大于0！", 2001);
            $editorValue = $params['editorValue'];
            //载入商品验证器
            $validate = new \app\common\validate\Goods();
            if (!$validate->check($params)) {
                return format_result($validate->getError(), 2001);
            }
            //验证通过加入数据库
            //商品图片的url地址数组
            $imgs = explode(",", $params['imgUrl']);
            //默认第一个为封面
            $cover = $imgs[0];
            unset($params['imgUrl']);//去掉数据库不同
            unset($params['/admin/goods/edit_html']);//去掉数据库不同
            unset($params['goods_id']);//去掉数据库不同
            unset($params['editorValue']);//去掉数据库不同
            $params['goods_cover'] = $cover;
            $params['goods_img'] = stripcslashes(json_encode($imgs));//去掉反斜线
            $params['goods_update_time'] = time();
            $params['goods_desc'] = $editorValue;
            $params['goods_original_price'] = $params['goods_current_price'];
            //存入数据库
            $res = GoodsModel::updateGoods($params, $goods_id);
            if ($res > 0) {
                return format_success_result();
            }
            return format_result("商品修改失败！", 2001);
        }
        return view('goods-edit', ['goods' => $goods, 'category' => $cateData]);
    }

    //删除商品
    public function del()
    {
        if (IS_GET) {
            $goodsId = input('goodsId');
            $res = GoodsModel::updateGoods(["goods_status"=>-1],$goodsId);
            if ($res > 0) {
                return format_success_result();
            }
            return format_result("删除商品失败", 2001);
        }
    }

    //批量删除
    public function batchDel()
    {
        $ids = input('ids');
        $idArr = explode(",", $ids);
        foreach ($idArr as $goodsId) {
            GoodsModel::updateGoods(["goods_status"=>-1],$goodsId);
        }
        return format_success_result();
    }

    //商品分类
    public function category()
    {
        $res = CategoryModel::getCategory();
        return view("category-list", ['category' => $res]);
    }

    //添加一级分类
    public function addcategorylev1()
    {
        if (IS_POST) {
            $params = $this->param;
            $categoryName = $params['categoryName'];
            if (CategoryModel::exitCateName($categoryName)) {
                return format_result("商品分类已经存在!", 2001);
            }
            $status = $params['status'];
            $data['category_name'] = $categoryName;
            $data['category_status'] = $status;
            $data['category_parent_id'] = 0;
            $data['category_create_time'] = time();
            $data['category_update_time'] = time();
            //添加分类
            $res = CategoryModel::addCategory($data);
            if ($res > 0) {
                return format_success_result();
            }
            return format_result("添加一级分类失败!", 2001);
        }
        return view("category-lev1-add");
    }

    //编辑一级分类
    public function editCategory()
    {
        $categoryId = input("categoryId");
        //获取分类信息
        $res = CategoryModel::getCategoryById($categoryId);
        if (IS_POST) {
            $params = $this->param;
            $categoryName = $params['categoryName'];
            if (CategoryModel::exitCateName($categoryName)) {
                return format_result("商品分类已经存在!", 2001);
            }
            $status = $params['status'];
            $data['category_name'] = $categoryName;
            $data['category_status'] = $status;
            $data['category_update_time'] = time();
            //修改一级分类
            $res = CategoryModel::updateCategory($data, $categoryId);
            if ($res > 0) {
                return format_success_result();
            }
            return format_result("修改一级分类失败!", 2001);
        }
        return view("category-lev1-edit", ['category' => $res]);
    }

    //添加二级分类
    public function addCategoryLev2()
    {
        $categoryLev1Id = input('categoryLev1Id');
        if (IS_GET) {
            //获取一级分类信息
            $res = CategoryModel::getCategoryById($categoryLev1Id);
        }
        if (IS_POST) {
            $params = $this->param;
            $categoryLev1Id = $params['categoryLev1Id'];
            $categoryName = $params['categoryLev2Name'];
            if (CategoryModel::exitCateName($categoryName)) {
                return format_result("商品分类已经存在!", 2001);
            }
            $status = $params['status'];
            $data['category_name'] = $categoryName;
            $data['category_status'] = $status;
            $data['category_parent_id'] = $categoryLev1Id;
            $data['category_create_time'] = time();
            $data['category_update_time'] = time();
            //添加分类
            $res = CategoryModel::addCategory($data);
            if ($res > 0) {
                return format_success_result();
            }
            return format_result("添加一级分类失败!", 2001);
        }
        return view("category-lev2-add", ['categoryLev1' => $res]);
    }

    //编辑二级分类
    public function editCategoryLev2()
    {
        $categoryLev2Id = input("categoryLev2Id");
        //获取分类信息
        $res = CategoryModel::getCategoryById($categoryLev2Id);
        if (IS_POST) {
            $params = $this->param;
            $categoryName = $params['categoryName'];
            if (CategoryModel::exitCateName($categoryName)) {
                return format_result("商品分类已经存在!", 2001);
            }
            $status = $params['status'];
            $data['category_name'] = $categoryName;
            $data['category_status'] = $status;
            $data['category_update_time'] = time();
            //修改二级分类
            $res = CategoryModel::updateCategory($data, $categoryLev2Id);
            if ($res > 0) {
                return format_success_result();
            }
            return format_result("修改二级分类失败!", 2001);
        }
        return view("category-lev2-edit", ['category' => $res]);
    }

    //停用分类
    public function stopCategory()
    {
        $categoryId = input("categoryId");
        //获取分类信息
        $res = CategoryModel::getCategoryById($categoryId);
        //获取分类的parentId
        $parentId = $res['category_parent_id'];
        if ($parentId > 0) {
            //直接禁用二级分类
            $res = CategoryModel::updateCategory(['category_status' => 0], $categoryId);
            if ($res > 0) {
                return format_success_result();
            }
            return format_result("停用分类失败!", 2001);
        }
        //是一级分类(其下边的二级分类全都停用)
        CategoryModel::updateCategory(['category_status' => 0], $categoryId);//先停用一级分类
        $categoryLev2 = CategoryModel::category($categoryId);
        if ($categoryLev2 != null) {
            foreach ($categoryLev2 as $value) {
                $categoryLev2Id = $value['category_id'];
                CategoryModel::updateCategory(['category_status' => 0], $categoryLev2Id);
            }
        }
        return format_success_result();
    }

    //启用分类
    public function startCategory()
    {
        $categoryId = input("categoryId");
        //获取分类信息
        $res = CategoryModel::getCategoryById($categoryId);
        //获取分类的parentId
        $parentId = $res['category_parent_id'];
        //二级分类
        if ($parentId > 0) {
            $parentCate = CategoryModel::getCategoryById($parentId);
            if($parentCate['category_status'] == 0){//一级分类被禁用了无法启动二级分类
                return format_result("一级分类被停用无法启动二级分类",2001);
            }
            //正常启用二级分类
            $res = CategoryModel::updateCategory(['category_status' => 1], $categoryId);
            if($res>0){
                return format_success_result();
            }else{
                return format_result("启用失败！",2001);
            }
        }
        //一级分类
        //直接启用
        $res = CategoryModel::updateCategory(['category_status' => 1], $categoryId);
        if($res>0){
            return format_success_result();
        }else{
            return format_result("启用失败！",2001);
        }
    }


}