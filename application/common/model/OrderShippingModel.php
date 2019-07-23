<?php
/**
 * @create by: 瑞信科技有限公司
 * @author: hanlidong
 * @Time: 2019/7/22 14:54
 * @desc: 订单配送信息表模型层
 */

namespace app\common\model;

use app\common\utils\Sql;
use think\Model;

class OrderShippingModel extends Model
{

    //添加订单配送信息表
    public function addOrderShipping($data){
        return Sql::_save("order_shipping",$data);
    }

}