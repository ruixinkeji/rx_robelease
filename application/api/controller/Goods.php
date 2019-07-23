<?php
/**
 * @create by: 瑞信科技有限公司
 * @author: hanlidong
 * @Time: 2019/7/18 16:19
 * @desc: 商品控制层
 */

namespace app\api\controller;

use app\common\controller\ApiController;
use app\common\facade\GoodsModel;
use app\common\facade\OrderItemModel;
use app\common\facade\OrderModel;
use app\common\facade\OrderShippingModel;
use app\common\facade\UserModel;
use app\common\utils\EasyWeChatUtil;
use app\common\utils\OrderNumberUtil;
use think\facade\Response;

class Goods extends ApiController
{
    /**
     * @api {GET} /details 商品详情
     * @apiGroup goods
     * @apiVersion 0.0.1
     * @apiDescription 用户的商品详情
     * @apiParam {int} goodsId 商品id号
     * @apiParamExample {json} 请求样例：
     *                goods/details/此参数为商品id号
     * @apiSuccess (2000) {String} message 信息
     * @apiSuccess (2000) {int} code 2000 代表无错误  其他代表有错误
     * @apiSuccessExample {json} 返回样例:
     *                {
     * "code": 2000,
     * "msg": "操作成功",
     * "data": {
     * "goods_id": 1,
     * "goods_name": "商品礼服出租啊啊啊",
     * "goods_num": 10,
     * "goods_img": [
     * "https://lf.ruixinec.com/e0c85abcfd72802c06737a1b1ec18a62.png",
     * "https://lf.ruixinec.com/f030e28e68e326cb70861cc58d9b2485.png"
     * ],
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
     */
    public function details($goodsId)
    {
        $res = GoodsModel::getGoodsById($goodsId);
        $res['goods_img'] = json_decode($res['goods_img']);
        return format_success_result($res);
    }

    /**
     * @api {POST} /buy 商品详情立即购买
     * @apiGroup goods
     * @apiVersion 0.0.1
     * @apiDescription 用户商品详情中的立即购买展示商品
     * @apiParam {String} Token 请求头中的token
     * @apiParam {int} goodsId 商品id
     * @apiParamExample {json} 请求样例：
     *                goods/buy?goodsId=1
     * @apiSuccess (2000) {String} message 信息
     * @apiSuccess (2000) {int} code 2000 代表无错误  其他代表有错误
     * @apiSuccessExample {json} 返回样例:
     *                {
     * "code": 2000,
     * "msg": "操作成功",
     * "data": {
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
     * "goods_update_time": 1563759303,
     * "goods_status": 1,
     * "goods_category_id": 4,
     * "goods_is_host": 0,
     * "goods_desc": "<p>描述描述aaaaaaaaaaa</p>"
     * }
     * }
     * {
     * "code": 2001,
     * "msg": "商品数量不足！",
     * "data": null
     * }
     */
    public function buy()
    {
        $params = $this->param;
        $goodsId = null;
        if (isset($params['goodsId'])) {
            $goodsId = $params['goodsId'];
        } else {
            return format_result("请求参数不存在！", 2001);
        }
        $goods = GoodsModel::getGoodsById($goodsId);
        if ($goods['goods_num'] == 0) {
            return format_result("商品数量不足！", 2001);
        }
        return format_success_result($goods);
    }

    /**
     * @api {POST} /advanceOrder 单件商品下预订单
     * @apiGroup goods
     * @apiVersion 0.0.1
     * @apiDescription 单件商品下预订单
     * @apiParam {String} Token 请求头中token
     * @apiParam {int} goodsId 商品id号
     * @apiParam {int} quantity 商品数量
     * @apiParam {int} leaseTime 租赁时间（天数）
     * @apiParam {int} postFee 邮费
     * @apiParam {int} paymentType 交易类型（1：线上支付，2：线下自提）
     * @apiParam {String} buyerMessage 买家留言
     * @apiParam {String} receiverName 收货人真实姓名
     * @apiParam {String} receiverPhone 收货人固定电话
     * @apiParam {String} receiverMobile 收货人移动电话
     * @apiParam {String} receiverState 收货人所在省
     * @apiParam {String} receiverCity 收货人所在市
     * @apiParam {String} receiverDistrict 收货人所在区
     * @apiParam {String} receiverAddress 收货人所在详细地址
     * @apiParam {String} receiverZip 收货人邮编
     * @apiParamExample {json} 请求样例：
     *                goods/advanceOrder?
     * @apiSuccess (2000) {String} message 信息
     * @apiSuccess (2000) {int} code 2000 代表无错误  其他代表有错误
     * @apiSuccessExample {json} 返回样例:
     *                {
     * "code": 2000,
     * "message": "成功",
     * "data": {
     * "session_key": "SdI/9k9sVQbHcFeegQmlHA==",
     * "openid": "oihuL5UJ9IFoEpwkooTBtBNXlFLM"
     * }
     * }
     */
    public function advanceOrder()
    {
        $params = $this->param;
        $userId = /*$this->getTokenUserId()*/1;//用户id
        $goodsId = $params['goodsId'];//商品id
        $quantity = $params['quantity'];//数量
        $leaseTime = $params['leaseTime'];//租赁时间（天数）
        $postFee = $params['postFee'];//邮费
        $paymentType = $params['paymentType'];//交易类型
        $buyerMessage = $params['buyerMessage'];//买家留言
        $receiverName = $params['receiverName'];//收货人的真实姓名
        $receiverPhone = $params['receiverPhone'];//收货人固定电话
        $receiverMobile = $params['receiverMobile'];//收货人的移动电话
        $receiverState = $params['receiverState'];//收货人所在的省
        $receiverCity = $params['receiverCity'];//收货人所在的市
        $receiverDistrict = $params['receiverDistrict'];//收货人所在的区
        $receiverAddress = $params['receiverAddress'];//收货人详细地址
        $receiverZip = $params['receiverZip'];//收货人邮编
        $goods = GoodsModel::getGoodsById($goodsId);//购买的商品
        $goods_num = $goods['goods_num'];
        $lease_time = $goods['goods_lease_time'];//商家限定租赁时间
        if ($quantity > $goods_num) return format_result("商品数量不足！", 2001);
        if ($leaseTime > $lease_time) return format_result("超出商家限定最大租赁时间",2001);
        $price = $goods['goods_current_price'];//商品单价
        $totalPrice = ($price * $quantity) * $leaseTime;//商品总价格
        $paymentPlatformOrderNumber = OrderNumberUtil::getOrderNumber();//支付平台订单号
        $ownPlatformOrderNumber = OrderNumberUtil::getOrderNumber();//自身平台订单号
        //订单信息表
        $orderData = array(
            'order_payment'=>$totalPrice,
            'order_payment_type'=>$paymentType,
            'order_post_fee'=>$postFee,
            'order_status'=>0,
            'order_create_time'=>time(),
            'order_update_time'=>time(),
            'order_platform_number'=>$ownPlatformOrderNumber,
            'order_payment_number'=>$paymentPlatformOrderNumber,
            'order_user_id'=>$userId,
            'order_buyer_message'=>$buyerMessage
        );
        //添加订单信息表
        $orderId = OrderModel::addOrder($orderData);
        //订单商品详情表
        $orderGoodsInfo = array(
            'order_item_goods_id'=>$goodsId,
            'order_item_order_id'=>$orderId,
            'order_item_num'=>$quantity,
            'order_item_name'=>$goods['goods_name'],
            'order_item_price'=>$price,
            'order_item_total_fee'=>$totalPrice,
            'order_item_pic_path'=>$goods['goods_cover']
        );
        //添加订单商品详情表
        $orderItemId = OrderItemModel::addOrderItem($orderGoodsInfo);
        //订单配送信息表
        $orderShipping = array(
            'order_shipping_order_id'=>$orderId,
            'order_shipping_receiver_name'=>$receiverName,
            'order_shipping_receiver_phone'=>$receiverPhone,
            'order_shipping_receiver_mobile'=>$receiverMobile,
            'order_shipping_receiver_state'=>$receiverState,
            'order_shipping_receiver_city'=>$receiverCity,
            'order_shipping_receiver_district'=>$receiverDistrict,
            'order_shipping_receiver_address'=>$receiverAddress,
            'order_shipping_receiver_zip'=>$receiverZip,
            'order_shipping_create_time'=>time(),
            'order_shipping_update_time'=>time()
        );
        //添加订单配送信息表
        $orderShippingId = OrderShippingModel::addOrderShipping($orderShipping);
        //获取支付对象
        $payment = EasyWeChatUtil::getPayMentObject();
        //把订单对象order(订单号,金额）以参数传入
        $goodsName = $goods['goods_name'];
        $user = UserModel::getUserById($userId);
        $openId = $user['user_openid'];
        $wxTotalPrice = $totalPrice * 100;
        $result = $payment->order->unify([
            'body' => "$goodsName",//商品名称
            'out_trade_no' => $paymentPlatformOrderNumber,//订单号
            'total_fee' => /*$wxTotalPrice*/1,//总价  单位：分
            'notify_url' => 'http://ruixinec.natapp1.cc/v1/goods/advanceOrderNotifyUrl', // 支付结果通知网址，如果不设置则会使用配置里的默认地址
            'trade_type' => 'JSAPI', // 请对应换成你的支付方式对应的值类型
            'openid' => "$openId",  //小程序openId
            'attach' => ''   //自定义参数
        ]);
        alert($result);
        if ($result['return_code'] == 'SUCCESS' && $result['result_code'] == 'SUCCESS') {
            $jssdk = $payment->jssdk;
            $prepayId = $result['prepay_id'];
            $json = $jssdk->bridgeConfig($prepayId, false);
            $codes['data'] = $json;
            return format_success_result($codes);
        }
        return format_result("支付请求错误！",2001);
    }


    //支付成功回调处理
    public function advanceOrderNotifyUrl(){
        $data = file_get_contents("php://input");
        $objArr = (array)simplexml_load_string($data, 'SimpleXMLElement', LIBXML_NOCDATA);
        if ($objArr['result_code'] != 'SUCCESS' || $objArr['return_code'] != 'SUCCESS') {
            die("fail");
        }
        $response = Response::instance();
        $response->sendData("<xml><return_code><![CDATA[SUCCESS]]></return_code><return_msg><![CDATA[OK]]></return_msg></xml>");//通知微信sdk回调逻辑完成
        //得到回调数据中的支付平台订单号out_trade_no
        $outTradeNo = $objArr['out_trade_no'];



    }


}