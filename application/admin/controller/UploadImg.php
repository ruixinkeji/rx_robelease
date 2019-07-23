<?php
/**
 * @create by: 瑞信科技有限公司
 * @author: hanlidong
 * @Time: 2019/7/17 10:19
 * @desc: 上传控制器
 */

namespace app\admin\controller;


use app\common\traits\Publics;
use app\common\utils\QiNiuUtil;

class UploadImg
{
    use Publics;

    //ajax公共上传图片
    public function ajaxUploadImg(){
        $res = $this->ajaxUploadImgQiniu();
        if($res != null){
            return format_success_result($res);
        }
        return format_result("上传失败",201);
    }

    //前端上传轮播图富文本图片到七牛云
    public function addUeditorPictureQiNiu(){
        $bannerValue =  $this->request->file('')['upfile'];
        $res = QiNiuUtil::qiniu_upload_fuwenben($bannerValue);
        $url = $res['data']['url'];
        return json(['state'=>'SUCCESS','url'=>$url]);
    }

}