<?php
/**
 * @create by: 瑞信科技有限公司
 * @author: hanlidong
 * @Time: 2019/7/18 15:59
 * @desc: 分类控制层
 */

namespace app\api\controller;

use app\common\controller\ApiController;
use app\common\facade\CategoryModel;
use app\common\facade\GoodsModel;

class Category extends ApiController
{

    /**
     * @api {GET} /lists 分类页全部二级分类
     * @apiGroup category
     * @apiVersion 0.0.1
     * @apiDescription 分类页全部二级分类
     * @apiParamExample {json} 请求样例：
     *                category/lists
     * @apiSuccess (2000) {String} message 信息
     * @apiSuccess (2000) {int} code 2000 代表无错误  其他代表有错误
     * @apiSuccessExample {json} 返回样例:
     *                {
     * "code": 2000,
     * "msg": "操作成功",
     * "data": [
     * {
     * "category_id": 4,
     * "category_name": "小的男装",
     * "category_img": "",
     * "category_parent_id": 1,
     * "category_order_sort": 0,
     * "category_status": 1,
     * "category_create_time": 123456789,
     * "category_update_time": 123456789
     * },
     * {
     * "category_id": 5,
     * "category_name": "大的男装",
     * "category_img": "",
     * "category_parent_id": 1,
     * "category_order_sort": 0,
     * "category_status": 1,
     * "category_create_time": 123456789,
     * "category_update_time": 123456789
     * }
     * ]
     * }
     */
    public function lists()
    {
        $res = CategoryModel::getCategoryLev2();
        return format_success_result($res);
    }

    /**
     * @api {GET} /goods 分类下的商品
     * @apiGroup category
     * @apiVersion 0.0.1
     * @apiDescription 二级分类下的商品，注意分页显示
     * @apiParam {int} categoryId 二级分类的id号
     * @apiParam {int} page 页号
     * @apiParam {int} pageSize 页面大小
     * @apiParamExample {json} 请求样例：
     *                category/goods/此参数为二级分类的id号/此参数为页号/此参数为页面大小
     * @apiSuccess (2000) {String} message 信息
     * @apiSuccess (2000) {int} code 2000 代表无错误  其他代表有错误
     * @apiSuccessExample {json} 返回样例:
     *                {
     * "code": 2000,
     * "msg": "操作成功",
     * "data": {
     * "total": 3,
     * "per_page": "2",
     * "current_page": 1,
     * "last_page": 2,
     * "data": [
     * {
     * "goods_id": 2,
     * "goods_name": "出租出租",
     * "goods_num": 20,
     * "goods_img": "[\"https://lf.ruixinec.com/timg1.jpg\"]",
     * "goods_cover": "https://lf.ruixinec.com/timg1.jpg",
     * "goods_current_price": "1020.00",
     * "goods_original_price": "2000.00",
     * "goods_admin_id": 1,
     * "goods_lease_time": 40,
     * "goods_create_time": 2147483647,
     * "goods_update_time": 214532145,
     * "goods_status": 1,
     * "goods_category_id": 4,
     * "goods_is_host": 0
     * },
     * {
     * "goods_id": 1,
     * "goods_name": "商品礼服出租啊啊啊",
     * "goods_num": 10,
     * "goods_img": "[\"https://lf.ruixinec.com/e0c85abcfd72802c06737a1b1ec18a62.png\",\"https://lf.ruixinec.com/f030e28e68e326cb70861cc58d9b2485.png\"]",
     * "goods_cover": "https://lf.ruixinec.com/e0c85abcfd72802c06737a1b1ec18a62.png",
     * "goods_current_price": "100.00",
     * "goods_original_price": "100.00",
     * "goods_admin_id": 1,
     * "goods_lease_time": 32,
     * "goods_create_time": 1563351565,
     * "goods_update_time": 1563351565,
     * "goods_status": 1,
     * "goods_category_id": 4,
     * "goods_is_host": 0
     * }
     * ]
     * }
     * }
     */
    public function goods($categoryId, $page, $pageSize)
    {
        $res = GoodsModel::getCategoryLev2Goods($categoryId, $page, $pageSize);
        return format_success_result($res);
    }



}