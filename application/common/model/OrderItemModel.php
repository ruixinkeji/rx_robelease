<?php
/**
 * @create by: 瑞信科技有限公司
 * @author: hanlidong
 * @Time: 2019/7/22 14:47
 * @desc: 订单商品项模型层
 */

namespace app\common\model;

use app\common\utils\Sql;
use think\Model;

class OrderItemModel extends Model
{

    //添加订单商品项
    public function addOrderItem($data){
        return Sql::_save("order_item",$data);
    }


}