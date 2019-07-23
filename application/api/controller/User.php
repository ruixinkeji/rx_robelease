<?php
/**
 * @create by: 瑞信科技有限公司
 * @author: hanlidong
 * @Time: 2019/7/16 9:45
 * @desc: 用户的控制层
 */

namespace app\api\controller;

use app\common\controller\ApiController;
use app\common\facade\MerchantModel;
use app\common\facade\UserModel;

class User extends ApiController
{
    /**
     * @api {GET} /weChatAuth 授权获取
     * @apiGroup user
     * @apiVersion 0.0.1
     * @apiDescription 用户授权获取openid，session_key
     * @apiParam {String} jsCode 前端jsCode
     * @apiParamExample {json} 请求样例：
     *                user/weChatAuth/001pzHMI06m1jg2VfCNI0f1vMI0pzHMS
     * @apiSuccess (2000) {String} message 信息
     * @apiSuccess (2000) {int} code 2000 代表无错误  其他代表有错误
     * @apiSuccessExample {json} 返回样例:
     *                {
     * "code": 2000,
     * "message": "成功",
     * "data": {
     * "session_key": "SdI/9k9sVQbHcFeegQmlHA==",
     * "openid": "oihuL5UJ9IFoEpwkooTBtBNXlFLM"
     * }
     * }
     */
    public function weChatAuth($jsCode)
    {
        $result = UserModel::weChatAuth($jsCode);
        return format_success_result($result);
    }

    /**
     * @api {POST} /login 授权登录
     * @apiGroup user
     * @apiVersion 0.0.1
     * @apiDescription 用于登录用户
     * @apiParam {String} iv 解密盐值
     * @apiParam {String} encryptedData 解密盐值
     * @apiParam {String} sessionKey Session_key值
     * @apiParamExample {json} 请求样例：
     *                ?iv=xx&encryptedData=xx&sessionKey=xx
     * @apiSuccess (2000) {String} message 信息
     * @apiSuccess (2000) {int} code 2000 代表无错误  其他代表有错误
     * @apiSuccessExample {json} 返回样例:
     *      {"code":"2000","message":"成功","data":{
     *          "token" : "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VySWQiOjN9.SIaSUoeGsW-stlbLvi6CQOIfce8Z-Opvt7H_pqzaGYM"
     *      }
     * }
     */
    public function login()
    {
        $params = $this->param;
        if (!isset($params['iv']) || !isset($params['encryptedData']) || !isset($params['sessionKey'])) {
            return format_result(2001, '请求参数不存在！');
        }
        $iv = $params['iv'];
        $encryptedData = $params['encryptedData'];
        $sessionKey = $params['sessionKey'];
        if (empty($iv) || empty($encryptedData) || empty($sessionKey)) {
            return format_result(2001, '请求参数值不能为空！');
        }
        $tokenArr = UserModel::login($iv, $encryptedData, $sessionKey, get_redis_client());
        return format_success_result($tokenArr);
    }

    /**
     * @api {GET} /info 用户基本信息
     * @apiGroup user
     * @apiVersion 0.0.1
     * @apiDescription 用户基本信息
     * @apiParam {String} Token 请求头中的token
     * @apiParamExample {json} 请求样例：
     *                user/info
     * @apiSuccess (2000) {String} message 信息
     * @apiSuccess (2000) {int} code 2000 代表无错误  其他代表有错误
     * @apiSuccessExample {json} 返回样例:
     *                {
     * "code": 2000,
     * "message": "成功",
     * "data": {
     * "session_key": "SdI/9k9sVQbHcFeegQmlHA==",
     * "openid": "oihuL5UJ9IFoEpwkooTBtBNXlFLM"
     * }
     * }
     */
    public function info()
    {
        $userId = $this->getTokenUserId();
        $userInfo = UserModel::getUserById($userId);
        return format_success_result($userInfo);
    }

    /**
     * @api {GET} /aboutMy 关于我们和联系方式
     * @apiGroup user
     * @apiVersion 0.0.1
     * @apiDescription 个人中心关于我们和联系方式
     * @apiParamExample {json} 请求样例：
     *                user/aboutMy
     * @apiSuccess (2000) {String} message 信息
     * @apiSuccess (2000) {int} code 2000 代表无错误  其他代表有错误
     * @apiSuccessExample {json} 返回样例:
     *                {
     * "code": 2000,
     * "msg": "操作成功",
     * "data": {
     * "merchant_id": 1,
     * "merchant_name": "正青春歌舞团",
     * "merchant_phone": "85784512",
     * "merchant_mobile": "13604011234",
     * "merchant_address": "辽宁省吉林市",
     * "merchant_lng": null,
     * "merchant_lat": null,
     * "merchant_description": "<p>公司简介简介</p><p>阿萨达阿萨啊啊敖德萨所阿萨撒撒啊</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;阿萨德阿萨撒撒发顺丰a<br/></p><p><img src=\"https://lf.ruixinec.com/f8137c4ea2e3a8e6850ca1d581ff28f8.png\" title=\"\" alt=\"\"/></p>"
     * }
     * }
     */
    public function aboutMy()
    {
        $res = MerchantModel::getMerchantInfo();
        return format_success_result($res);
    }


}