<?php
/**
 * @create by: 瑞信科技有限公司
 * @author: hanlidong
 * @Time: 2019/7/16 10:51
 * @desc: 用户模型层
 */

namespace app\common\model;

use app\common\utils\EasyWeChatUtil;
use app\common\utils\Sql;
use Firebase\JWT\JWT;
use think\Model;

class UserModel extends Model
{

    //微信授权
    public function weChatAuth($jsCode)
    {
        $apps = EasyWeChatUtil::getApplet();
        $result = $apps->auth->session($jsCode);
        return $result;
    }

    //用户登录
    public function login($iv, $encryptedData, $sessionKey,$redis){
        $apps = EasyWeChatUtil::getApplet();
        $decryptedData = $apps->encryptor->decryptData($sessionKey, $iv, $encryptedData);
        $openId = $decryptedData['openId'];
//        $unionId = $decryptedData['unionId'];
        $user =Sql::_find("users",['user_openid'=>$openId]);
        $token_key = config('jwt')['key'];
        if ($user == null) {
            $userInsertData = array(
                'user_nickname' => filter_string($decryptedData['nickName']),
                'user_password' => md5("123456"),
                'user_openid' => $openId,
                'user_sex' => $decryptedData['gender'],
                'user_avatar' => $decryptedData['avatarUrl'],
                'user_create_time' => time(),
//                'user_unitionid' => $unionId
            );
            $userId = Sql::_save("users",$userInsertData);
            $userInfoInsertData = array(
                'userinfo_user_id' => $userId,
                'userinfo_provice' => $decryptedData['province'],
                'userinfo_city' => $decryptedData['city'],
            );
            Sql::_save("user_info",$userInfoInsertData);
            //登陆成功用jwt生成token
            $token = array(
                "userId" => $userId,
                "openId" => $openId
            );
            $jwt = JWT::encode($token, $token_key);
            //存放到redis里
            $redis->set($openId, $jwt);//设置redis中token时间无限制
            $data['token'] = $jwt;
            return $data;
        }
        $userId = $user['user_id'];
        $openId = $user['user_openid'];
        //登陆成功用jwt生成token
        $token = array(
            "userId" => $userId,
            "openId" => $openId
        );
        $jwt = JWT::encode($token, $token_key);
        //存放到redis里
        $redis->set($openId, $jwt);//设置redis中token时间无限制
        $data['token'] = $jwt;
        return $data;
    }

    //根据id号获取用户
    public function getUserById($userId){
        return Sql::_find("users",['user_id'=>$userId]);
    }


}