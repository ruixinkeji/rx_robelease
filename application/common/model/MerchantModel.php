<?php
/**
 * @create by: 瑞信科技有限公司
 * @author: hanlidong
 * @Time: 2019/7/22 9:38
 * @desc: 商家公司信息描述
 */

namespace app\common\model;

use app\common\utils\Sql;
use think\Model;

class MerchantModel extends Model
{

    //获取公司信息
    public function getMerchantInfo(){
        return Sql::_find("merchant",[]);
    }

    //修改公司信息
    public function updateMerchant($data,$id){
        return Sql::_update("merchant",['merchant_id'=>$id],$data);
    }

}