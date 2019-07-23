<?php
/**
 * @create by: 瑞信科技有限公司
 * @author: hanlidong
 * @Time: 2019/7/16 13:24
 * @desc: bannerModel 门面类
 */

namespace app\common\facade;

use think\Facade;

class BannerModel extends Facade
{
    protected static function getFacadeClass()
    {
        return 'app\common\model\BannerModel';
    }

}