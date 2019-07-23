<?php
/**
 * @create by: 瑞信科技有限公司
 * @author: hanlidong
 * @Time: 2019/7/18 16:49
 * @desc: 用户购物车控制层
 */

namespace app\api\controller;

use app\common\controller\ApiController;
use app\common\facade\GoodsModel;

class Cart extends ApiController
{
    /**
     * @api {GET} /add 物品加入购物车
     * @apiGroup cart
     * @apiVersion 0.0.1
     * @apiDescription 物品加入购物车
     * @apiParam {String} Token 请求头中的token
     * @apiParam {int}  goodsId  商品id号
     * @apiParamExample {json} 请求样例：
     *                cart/add/此参数为商品id号
     * @apiSuccess (2000) {String} message 信息
     * @apiSuccess (2000) {int} code 2000 代表无错误  其他代表有错误
     * @apiSuccessExample {json} 返回样例:
     *                {
     * "code": 2000,
     * "msg": "操作成功",
     * "data": null
     * }
     */
    public function add($goodsId)
    {
        $userId = $this->getTokenUserId();
        $cartKey = config('CART_KEY') . $userId;//用户的购物车key
        $redis = get_redis_client();
        $userCart = $redis->get($cartKey);
        if ($userCart == null) {
            //第一次加入商品
            $data = array(
                'goodsId' => $goodsId,
                'total' => 1
            );
            $redis->set($cartKey, json_encode([$data]));
            return format_success_result();
        } else {
            //购物车中存在商品
            $userCartArr = json_decode($userCart, true);
            $temp = false;//这个值是记录当前商品是否被放入购物车了
            $newCart = [];
            foreach ($userCartArr as $value) {
                if ($value['goodsId'] == $goodsId) {
                    $value['total'] += 1;//存在了就继续在原有的数量上加1
                    $temp = true;//改变记录是否放入购物车的值
                }
                array_push($newCart, $value);
            }
            if ($temp) {
                //是重复的商品已经加数量了
                //覆盖原有的购物车
                $redis->set($cartKey, json_encode($newCart));
            } else {
                //商品不是重复的商品是新商品
                //在原有的数组头中加入一条
                array_unshift($newCart, ['goodsId' => $goodsId, 'total' => 1]);
                $redis->set($cartKey, json_encode($newCart));
            }
            return format_success_result();
        }


    }

    /**
     * @api {GET} /goodsNum 购物车商品数量
     * @apiGroup cart
     * @apiVersion 0.0.1
     * @apiDescription 购物车商品数量
     * @apiParam {String} Token 请求头中的token
     * @apiParamExample {json} 请求样例：
     *                cart/goodsNum
     * @apiSuccess (2000) {String} message 信息
     * @apiSuccess (2000) {int} code 2000 代表无错误  其他代表有错误
     * @apiSuccessExample {json} 返回样例:
     *                {
     * "code": 2000,
     * "msg": "操作成功",
     * "data": {
     * "cartGoodsNum": 3
     * }
     * }
     */
    public function goodsNum()
    {
        $userId = $this->getTokenUserId();
        $cartKey = config('CART_KEY') . $userId;//用户的购物车key
        $redis = get_redis_client();
        $userCart = $redis->get($cartKey);
        if ($userCart == null) {
            return format_success_result(['cartGoodsNum' => 0]);
        }
        return format_success_result(['cartGoodsNum' => count(json_decode($userCart, true))]);
    }

    /**
     * @api {GET} /goodsList 购物车列表
     * @apiGroup cart
     * @apiVersion 0.0.1
     * @apiDescription 购物车列表
     * @apiParam {String} Token 请求头中的token
     * @apiParamExample {json} 请求样例：
     *                cart/goodsList
     * @apiSuccess (2000) {String} message 信息
     * @apiSuccess (2000) {int} code 2000 代表无错误  其他代表有错误
     * @apiSuccessExample {json} 返回样例:
     *                {
     * "code": 2000,
     * "msg": "操作成功",
     * "data": [
     * {
     * "goodsId": "3",
     * "total": 1,
     * "is_invalid": 1,
     * "goods": {
     * "goods_id": 3,
     * "goods_name": "啊啊啊啊啊啊",
     * "goods_num": 30,
     * "goods_img": "[\"https://lf.ruixinec.com/timg1.jpg\"]",
     * "goods_cover": "https://lf.ruixinec.com/timg1.jpg",
     * "goods_current_price": "100.00",
     * "goods_original_price": "100.00",
     * "goods_admin_id": 1,
     * "goods_lease_time": 30,
     * "goods_create_time": 123456789,
     * "goods_update_time": 123456789,
     * "goods_status": -1,
     * "goods_category_id": 5,
     * "goods_is_host": 1
     * }
     * },
     * {
     * "goodsId": "2",
     * "total": 3,
     * "is_invalid": 0,
     * "goods": {
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
     * }
     * },
     * {
     * "goodsId": "1",
     * "total": 3,
     * "is_invalid": 0,
     * "goods": {
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
     * }
     * ]
     * }
     */
    public function goodsList()
    {
        $userId = $this->getTokenUserId();
        $cartKey = config('CART_KEY') . $userId;//用户的购物车key
        $redis = get_redis_client();
        $userCart = $redis->get($cartKey);
        if ($userCart == null) {
            return format_success_result([]);
        }
        //判断购物车中的商品是否存在，在后台被停用，或者被删除的商品
        $userCartArr = json_decode($userCart, true);
        $data = [];//存放最终的数据
        foreach ($userCartArr as $value) {
            $goodsId = $value['goodsId'];
            $value['is_invalid'] = 0;//是否是失效的商品（0：不是失效的商品,1：是失效的商品）
            //获取商品信息
            $goods = GoodsModel::getGoodsById($goodsId);
            if ($goods['goods_status'] == -1 || $goods['goods_status'] == 0) {//下架的和被删除的
                $value['is_invalid'] = 1;//商品被下架或删除了，变为失效的
            }
            $value['goods'] = $goods;
            array_push($data, $value);
        }
        return format_success_result($data);
    }

    /**
     * @api {GET} /emptyCart 清空购物车
     * @apiGroup cart
     * @apiVersion 0.0.1
     * @apiDescription 用户清空购物车
     * @apiParam {String} Token 请求头中的token
     * @apiParamExample {json} 请求样例：
     *                cart/emptyCart
     * @apiSuccess (2000) {String} message 信息
     * @apiSuccess (2000) {int} code 2000 代表无错误  其他代表有错误
     * @apiSuccessExample {json} 返回样例:
     *                {
     * "code": 2000,
     * "msg": "操作成功",
     * "data": null
     * }
     */
    public function emptyCart()
    {
        $userId = $this->getTokenUserId();
        $cartKey = config('CART_KEY') . $userId;//用户的购物车key
        $redis = get_redis_client();
        $userCart = $redis->get($cartKey);
        if ($userCart == null) {
            return format_success_result();
        }
        $redis->del($cartKey);
        return format_success_result();
    }

    /**
     * @api {GET} /minus 减掉购物车的数量
     * @apiGroup cart
     * @apiVersion 0.0.1
     * @apiDescription 减掉购物车的数量
     * @apiParam {String} Token 请求头中的token
     * @apiParam {int} goodsId 商品id号
     * @apiParamExample {json} 请求样例：
     *                cart/minus/此参数为商品id号
     * @apiSuccess (2000) {String} message 信息
     * @apiSuccess (2000) {int} code 2000 代表无错误  其他代表有错误
     * @apiSuccessExample {json} 返回样例:
     *                {
     * "code": 2000,
     * "msg": "操作成功",
     * "data": null
     * }
     * {
     * "code": 2001,
     * "msg": "商品数量不能再少了！",
     * "data": null
     * }
     */
    public function minus($goodsId)
    {
        $userId = $this->getTokenUserId();
        $cartKey = config('CART_KEY') . $userId;//用户的购物车key
        $redis = get_redis_client();
        $userCart = $redis->get($cartKey);
        //若商品的数量为一则减一个数量为0了就不让继续减了
        $userCartArr = json_decode($userCart, true);
        $data = [];
        foreach ($userCartArr as $value) {
            if ($goodsId == $value['goodsId']) {
                if ($value['total'] == 1) {
                    return format_result("商品数量不能再少了！", 2001);
                }
                $value['total'] -= 1;
            }
            array_push($data, $value);
        }
        $redis->set($cartKey, json_encode($data));
        return format_success_result();
    }

    /**
     * @api {POST} /delGoods 批量移除购物车商品
     * @apiGroup cart
     * @apiVersion 0.0.1
     * @apiDescription 批量移除购物车商品
     * @apiParam {String} Token 请求头的token
     * @apiParam {String} ids 商品id的数组（注意：转成json字符串传入）
     * @apiParamExample {json} 请求样例：
     *                cart/delGoods
     * @apiSuccess (2000) {String} message 信息
     * @apiSuccess (2000) {int} code 2000 代表无错误  其他代表有错误
     * @apiSuccessExample {json} 返回样例:
     *                {
     * "code": 2000,
     * "msg": "操作成功",
     * "data": null
     * }
     */
    public function delGoods()
    {
        $userId = $this->getTokenUserId();
        $params = $this->param;
        if (isset($params['ids'])) {
            $ids = $params['ids'];
        } else {
            return format_result("商品id数组json错误！", 2001);
        }
        $idsArr = json_decode($ids, true);
        $cartKey = config('CART_KEY') . $userId;//用户的购物车key
        $redis = get_redis_client();
        $userCart = $redis->get($cartKey);
        //若商品的数量为一则减一个数量为0了就不让继续减了
        $userCartArr = json_decode($userCart, true);
        $data = [];
        foreach ($userCartArr as $value) {
            if (!in_array($value["goodsId"], $idsArr)) {
                array_push($data, $value);
            }
        }
        if (empty($data)) {
            //购物车中的商品全被删除了,清除redis的key
            $redis->del($cartKey);
            return format_success_result();
        }
        $redis->set($cartKey, json_encode($data));
        return format_success_result();
    }


}