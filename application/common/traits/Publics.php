<?php
/**
 * @create by: 瑞信科技有限公司
 * @User: hanlidong
 * @Date: 2019/7/15 0015
 * @Time: 21:40
 * @desc: 公共方法类
 */


namespace app\common\traits;


use app\common\utils\QiNiuUtil;
use think\facade\Request;

trait Publics
{
    private $request;

    public function __construct()
    {
        $this->request = Request::instance();
    }

    //ajax上传图片到七牛云
    public function ajaxUploadImgQiniu(){
        $file = $this->request->file('file');
        $res = QiNiuUtil::qiniu_upload($file);
        return $res;
    }

}