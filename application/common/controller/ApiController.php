<?php
/**
 * @create by: 瑞信科技有限公司
 * @User: hanlidong
 * @Date: 2019/7/15 0015
 * @Time: 20:39
 * @desc: 接口公共控制器
 */


namespace app\common\controller;


use Firebase\JWT\JWT;

class ApiController extends BaseController
{
    //获取请求头中Token里用户id号
    public function getTokenUserId()
    {
        $req = $this->request;
        $token = $req->header('Token');
        $userId = (JWT::decode($token, config('jwt')['key'], array('HS256')))->userId;
        return $userId;
    }

    //获取请求头中Token里用户openID
    public function getTokenOpenId()
    {
        $req = $this->request;
        $token = $req->header('Token');
        $openId = (JWT::decode($token, config('jwt')['key'], array('HS256')))->openId;
        return $openId;
    }
}