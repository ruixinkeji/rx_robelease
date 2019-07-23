<?php
/**
 * @create by: 瑞信科技有限公司
 * @author: hanlidong
 * @Time: 2019/7/16 15:32
 * @desc: 七牛云上传工具类
 */

namespace app\common\utils;

use Qiniu\Auth;
use Qiniu\Storage\UploadManager;

final class QiNiuUtil
{
    /*
     * 上传base64图片到七牛云
     * */
    public static function uploadPicBase64($picture)
    {
        //生成图片key
        $randUtil = new RandUtil();
        $Key = 'RUI_XIN_'.$randUtil->randStr();
        $upToken = self::getQiNiuToken();
        // 初始化 UploadManager 对象并进行文件的上传
        $uploadMgr = new UploadManager();
        $picture = base64_decode($picture);
        try {
            $ups= $uploadMgr->put($upToken, $Key, $picture);
            return $ups[0]['key'];
        } catch (\Exception $e) {
            return null;
        }
    }

    /*
     *七牛云上传本地文件图片
     * $avatar 上传(request()->file('avatar');)
     * */
    public static function uploadPicFile($avatar)
    {
        $qnAvatar = null;
        $filePath = $avatar->getRealPath();
        $ext = pathinfo($avatar->getInfo('name'), PATHINFO_EXTENSION);  //后缀
        // 上传到七牛后保存的文件名
        $key = substr(md5($avatar->getRealPath()), 0, 5) . date('YmdHis') . rand(0, 9999) . '.' . $ext;
        $token = self::getQiNiuToken();
        $domin = config('qn')['domain'];
        // 初始化 UploadManager 对象并进行文件的上传
        $uploadMgr = new UploadManager();
        // 调用 UploadManager 的 putFile 方法进行文件的上传
        try {
            list($ret, $err) = $uploadMgr->putFile($token, $key, $filePath);
            if ($err == null) {
                $qnAvatar = $domin . $ret['key'];
                return $qnAvatar;
            }
        } catch (\Exception $e) {
            return $qnAvatar;
        }
        return $qnAvatar;
    }

    /**
     * 图片上传，ajax返回
     * 七牛云存储图片
     */
    public static function qiniu_upload($image)
    {
        $filePath = $image->getRealPath();
        // 要上传的空间
        $token = self::getQiNiuToken();// 生成上传 Token
        // 上传到七牛后保存的文件名
        $key = md5(time()) . '.png';
        // 初始化 UploadManager 对象并进行文件的上传
        $uploadMgr = new UploadManager();
        // 调用 UploadManager 的 putFile 方法进行文件的上传
        sleep(1);//睡眠1秒，防止并发请求七牛云导致图片上传不上去
        list($res,$err) = $uploadMgr->putFile($token, $key, $filePath);
        if(empty($err)){
            return config('qn')['domain'] . $res["key"];
        }
        return null;
    }


    /**
     * 图片上传七牛云富文本上传，ajax返回
     * 七牛云存储图片
     */
    public static function qiniu_upload_fuwenben($image)
    {
        $filePath = $image->getRealPath();
        // 要上传的空间
        $token = self::getQiNiuToken();// 生成上传 Token
        // 上传到七牛后保存的文件名
        $key = md5(time()) . '.png';
        // 初始化 UploadManager 对象并进行文件的上传
        $uploadMgr = new UploadManager();
        // 调用 UploadManager 的 putFile 方法进行文件的上传
        sleep(1);//睡眠1秒，防止并发请求七牛云导致图片上传不上去
        list($ret,$err) = $uploadMgr->putFile($token, $key, $filePath);
        if ($err === null) {
            $data['url'] =$ret['key'];
            return ['code'=>200,'msg'=>'success','data'=>$data];
        }
        return ['code'=>201,'msg'=>'error'];
    }


    //获取七牛云的上传token
    public static function getQiNiuToken()
    {
        // 需要填写你的 Access Key 和 Secret Key
        $accessKey = config('qn')['accessKey'];
        $secretKey = config('qn')['secretKey'];
        // 构建鉴权对象
        $auth = new Auth($accessKey, $secretKey);
        // 要上传的空间
        $bucket = config('qn')['bucket'];
        $token = $auth->uploadToken($bucket);
        return $token;
    }

}