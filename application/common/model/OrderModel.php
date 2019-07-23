<?php
/**
 * @create by: 瑞信科技有限公司
 * @author: hanlidong
 * @Time: 2019/7/22 14:42
 * @desc: 订单主表模型层
 */

namespace app\common\model;

use app\common\utils\Sql;
use think\Model;

class OrderModel extends Model
{

    //添加订单
    public function addOrder($data){
        return Sql::_save("order",$data);
    }


}