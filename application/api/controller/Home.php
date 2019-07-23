<?php
/**
 * @create by: 瑞信科技有限公司
 * @author: hanlidong
 * @Time: 2019/7/16 13:20
 * @desc: 首页接口
 */

namespace app\api\controller;

use app\common\controller\ApiController;
use app\common\facade\BannerModel;
use app\common\facade\CategoryModel;
use app\common\facade\GoodsModel;

class Home extends ApiController
{

    /**
     * @api {GET} /banners 首页轮播图
     * @apiGroup home
     * @apiVersion 0.0.1
     * @apiDescription 首页轮播图展示
     * @apiParamExample {json} 请求样例：
     *                /home/banners
     * @apiSuccess (2000) {String} message 信息
     * @apiSuccess (2000) {int} code 2000 代表无错误  其他代表有错误
     * @apiSuccessExample {json} 返回样例:
     *                {
     * "code": 2000,
     * "msg": "操作成功",
     * "data": [
     * {
     * "banner_id": 2,
     * "banner_name": "轮播2",
     * "banner_cover": "https://xiaofuwu.mayiershou.cn/Fv9ync3gSrQAcmY5LlnFsB5Io_AU",
     * "banner_url": null,
     * "banner_order_sort": 2,
     * "banner_describe": "我是轮播描述2",
     * "banner_status": 1,
     * "banner_create_time": 1234567897,
     * "banner_update_time": 1234567897
     * },
     * {
     * "banner_id": 1,
     * "banner_name": "轮播1",
     * "banner_cover": "https://xiaofuwu.mayiershou.cn/Fv9ync3gSrQAcmY5LlnFsB5Io_AU",
     * "banner_url": null,
     * "banner_order_sort": 1,
     * "banner_describe": "我是轮播描述1",
     * "banner_status": 1,
     * "banner_create_time": 1234567897,
     * "banner_update_time": 1234567897
     * }
     * ]
     * }
     */
    public function banners()
    {
        $banners = BannerModel::banners();
        return format_success_result($banners);
    }

    /**
     * @api {GET} /bannerDetails 轮播图详情
     * @apiGroup home
     * @apiVersion 0.0.1
     * @apiDescription 轮播图详情
     * @apiParam {int} bannerId 轮播图id号
     * @apiParamExample {json} 请求样例：
     *                /home/bannerDetails/此参数为轮播图的id号
     * @apiSuccess (2000) {String} message 信息
     * @apiSuccess (2000) {int} code 2000 代表无错误  其他代表有错误
     * @apiSuccessExample {json} 返回样例:
     *                {
     * "code": 2000,
     * "msg": "操作成功",
     * "data": {
     * "banner_id": 1,
     * "banner_name": "轮播1",
     * "banner_cover": "https://lf.ruixinec.com/timg2.jpg",
     * "banner_url": null,
     * "banner_order_sort": 1,
     * "banner_describe": "我是轮播描述1",
     * "banner_status": 1,
     * "banner_create_time": 1234567897,
     * "banner_update_time": 1234567897
     * }
     * }
     */
    public function bannerDetails($bannerId)
    {
        $banner = BannerModel::getBannerById($bannerId);
        return format_success_result($banner);
    }

    /**
     * @api {GET} /categoryLev1 商品一级分类
     * @apiGroup home
     * @apiVersion 0.0.1
     * @apiDescription 首页商品一级分类（全部 默认写死 id=0）
     * @apiParamExample {json} 请求样例：
     *                /home/categoryLev1
     * @apiSuccess (2000) {String} message 信息
     * @apiSuccess (2000) {int} code 2000 代表无错误  其他代表有错误
     * @apiSuccessExample {json} 返回样例:
     *                {
     * "code": 2000,
     * "msg": "操作成功",
     * "data": [
     * {
     * "category_id": 1,
     * "category_name": "男装",
     * "category_img": "",
     * "category_parent_id": 0,
     * "category_order_sort": 0,
     * "category_status": 1,
     * "category_create_time": 123456789,
     * "category_update_time": 123456789
     * },
     * {
     * "category_id": 2,
     * "category_name": "女装",
     * "category_img": "",
     * "category_parent_id": 0,
     * "category_order_sort": 0,
     * "category_status": 1,
     * "category_create_time": 123456789,
     * "category_update_time": 123456789
     * },
     * {
     * "category_id": 3,
     * "category_name": "道具",
     * "category_img": "",
     * "category_parent_id": 0,
     * "category_order_sort": 0,
     * "category_status": 1,
     * "category_create_time": 123456789,
     * "category_update_time": 123456789
     * }
     * ]
     * }
     */
    public function categoryLev1()
    {
        $categorys = CategoryModel::category();
        return format_success_result($categorys);
    }

    /**
     * @api {GET} /categoryGoods 首页分类下商品
     * @apiGroup home
     * @apiVersion 0.0.1
     * @apiDescription 首页一级分类下的商品展示
     * @apiParam {int} categoryLev1Id 一级分类id号
     * @apiParamExample {json} 请求样例：
     *                home/categoryGoods/此参数是一级分类的id号(注意：全部分类传递的值为 0)
     * @apiSuccess (2000) {String} message 信息
     * @apiSuccess (2000) {int} code 2000 代表无错误  其他代表有错误
     * @apiSuccessExample {json} 返回样例:
     *                {
     * "code": 2000,
     * "msg": "操作成功",
     * "data": [
     * {
     * "goods_id": 1,
     * "goods_name": "商品礼服出租",
     * "goods_num": 10,
     * "goods_img": "https://www.xxx.com/img.png",
     * "goods_cover": "https://www.xxx.com/img.png",
     * "goods_current_price": "100.00",
     * "goods_original_price": "100.00",
     * "goods_admin_id": 1,
     * "goods_lease_time": 123456789,
     * "goods_create_time": 254365789,
     * "goods_update_time": 254365789,
     * "goods_status": 1,
     * "goods_category_id": 4,
     * "goods_is_host": 0
     * },
     * {
     * "goods_id": 3,
     * "goods_name": "啊啊啊啊啊啊",
     * "goods_num": 30,
     * "goods_img": null,
     * "goods_cover": null,
     * "goods_current_price": "100.00",
     * "goods_original_price": "100.00",
     * "goods_admin_id": 1,
     * "goods_lease_time": 123456789,
     * "goods_create_time": 123456789,
     * "goods_update_time": 123456789,
     * "goods_status": 1,
     * "goods_category_id": 5,
     * "goods_is_host": 0
     * },
     * {
     * "goods_id": 4,
     * "goods_name": "哦哦哦哦",
     * "goods_num": 87,
     * "goods_img": "",
     * "goods_cover": null,
     * "goods_current_price": "360.00",
     * "goods_original_price": "360.00",
     * "goods_admin_id": 1,
     * "goods_lease_time": 123456789,
     * "goods_create_time": 123456789,
     * "goods_update_time": 123456789,
     * "goods_status": 1,
     * "goods_category_id": 6,
     * "goods_is_host": 0
     * }
     * ]
     * }
     */
    public function categoryGoods($categoryLev1Id)
    {
        $categoryGoods = CategoryModel::categoryLev1Goods($categoryLev1Id);
        return format_success_result($categoryGoods);
    }

    /**
     * @api {GET} /hostGoods 首页热门服装
     * @apiGroup home
     * @apiVersion 0.0.1
     * @apiDescription 首页热门服装
     * @apiParamExample {json} 请求样例：
     *                home/hostGoods
     * @apiSuccess (2000) {String} message 信息
     * @apiSuccess (2000) {int} code 2000 代表无错误  其他代表有错误
     * @apiSuccessExample {json} 返回样例:
     *                {
     * "code": 2000,
     * "msg": "操作成功",
     * "data": [
     * {
     * "goods_id": 3,
     * "goods_name": "啊啊啊啊啊啊",
     * "goods_num": 30,
     * "goods_img": null,
     * "goods_cover": null,
     * "goods_current_price": "100.00",
     * "goods_original_price": "100.00",
     * "goods_admin_id": 1,
     * "goods_lease_time": 123456789,
     * "goods_create_time": 123456789,
     * "goods_update_time": 123456789,
     * "goods_status": 1,
     * "goods_category_id": 5,
     * "goods_is_host": 1
     * },
     * {
     * "goods_id": 4,
     * "goods_name": "哦哦哦哦",
     * "goods_num": 87,
     * "goods_img": "",
     * "goods_cover": null,
     * "goods_current_price": "360.00",
     * "goods_original_price": "360.00",
     * "goods_admin_id": 1,
     * "goods_lease_time": 123456789,
     * "goods_create_time": 123456789,
     * "goods_update_time": 123456789,
     * "goods_status": 1,
     * "goods_category_id": 6,
     * "goods_is_host": 1
     * }
     * ]
     * }
     */
    public function hostGoods()
    {
        $res = GoodsModel::hostGoods(true);
        return format_success_result($res);
    }

    /**
     * @api {GET} /hostGoodsMore 首页热门更多
     * @apiGroup home
     * @apiVersion 0.0.1
     * @apiDescription 首页热门更多
     * @apiParam {int} page 页号
     * @apiParam {int} pageSize 页面大小
     * @apiParamExample {json} 请求样例：
     *                home/hostGoodsMore/此参数为页号/此参数为页面显示数
     * @apiSuccess (2000) {String} message 信息
     * @apiSuccess (2000) {int} code 2000 代表无错误  其他代表有错误
     * @apiSuccessExample {json} 返回样例:
     *                {
     * "code": 2000,
     * "msg": "操作成功",
     * "data": {
     * "total": 2,
     * "per_page": "2",
     * "current_page": 1,
     * "last_page": 1,
     * "data": [
     * {
     * "goods_id": 3,
     * "goods_name": "啊啊啊啊啊啊",
     * "goods_num": 30,
     * "goods_img": null,
     * "goods_cover": null,
     * "goods_current_price": "100.00",
     * "goods_original_price": "100.00",
     * "goods_admin_id": 1,
     * "goods_lease_time": 123456789,
     * "goods_create_time": 123456789,
     * "goods_update_time": 123456789,
     * "goods_status": 1,
     * "goods_category_id": 5,
     * "goods_is_host": 1
     * },
     * {
     * "goods_id": 4,
     * "goods_name": "哦哦哦哦",
     * "goods_num": 87,
     * "goods_img": "",
     * "goods_cover": null,
     * "goods_current_price": "360.00",
     * "goods_original_price": "360.00",
     * "goods_admin_id": 1,
     * "goods_lease_time": 123456789,
     * "goods_create_time": 123456789,
     * "goods_update_time": 123456789,
     * "goods_status": 1,
     * "goods_category_id": 6,
     * "goods_is_host": 1
     * }
     * ]
     * }
     * }
     */
    public function hostGoodsMore($page, $pageSize)
    {
        $res = GoodsModel::hostGoods(false, $page, $pageSize);
        return format_success_result($res);
    }


}