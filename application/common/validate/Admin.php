<?php
/**
 * @create by: 瑞信科技有限公司
 * @author: hanlidong
 * @Time: 2019/7/18 14:19
 * @desc: admin管理员验证类
 */

namespace app\common\validate;

use think\Validate;

class Admin extends Validate
{

    protected $rule = [
        'admin_user_name|管理员名' => 'require',
        'admin_password|密码'=>'require|alphaNum',
        'admin_phone|电话'=>'require|mobile',
    ];


}