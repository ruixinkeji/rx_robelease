<?php
/**
 * @create by: 瑞信科技有限公司
 * @author: hanlidong
 * @Time: 2019/7/16 9:54
 * @desc: 用于token的拦截中间件
 */

namespace app\api\middleware;

use Firebase\JWT\JWT;

class TokenMiddleware
{
    public function handle($request, \Closure $next)
    {
        $req = $request;
        $token = $req->header('Token');
        if($token == null){
            return format_result('请求token不能为空！',2001);
        }
        try{
            $requestsTokenOpenId = (JWT::decode($token, config('jwt')['key'], array('HS256')))->openId;//解码前台带过来的token中的openId
        }catch (\Exception $e){
            return format_result('token存在异常！',2001);
        }
        $redis = get_redis_client();
        $redis_token = $redis->get($requestsTokenOpenId);
        if($redis_token == null){
            return format_result('token过期重新登录！',2001);
        }
        if($redis_token != $token){
            return format_result('token验证错误重新登录！',2001);
        }
        return $next($request);
    }
}