<?php
/**
 * @create by: 瑞信科技有限公司
 * @User: hanlidong
 * @Date: 2019/7/15 0015
 * @Time: 20:39
 * @desc: 后台公共控制器
 */


namespace app\common\controller;


use app\common\utils\Sql;
use Exception;
use gmars\rbac\Rbac;
use think\facade\Request;

class AdminController extends BaseController
{

    protected function initialize()
    {
        parent::initialize();
        $this->setMeta("礼服租赁系统");

        //不需要验证登录的页面
        $exception_arth_list = [
            'admin/index/login', //登陆页面
            'admin/index/logout', //退出登录
        ];
        //不需要验证权限的页面
        $exception_auth = [
            '/admin/index/login', //登陆页面
            '/admin/index/logout', //退出登录
        ];
        $redirect_url = 'admin/index/login';
        //检查是否登录
        $this->checkUserLogin($redirect_url, $exception_arth_list, "请您先登录后台！");
        //检查权限是否足够
        $adminId = session('user_auth.id');
        $checkResult = $this->checkRule($adminId,$exception_auth);
        if($checkResult){
            return;
        }else{
            return $this->error('您没有权限操作!', "admin/index/login", null, 2);
        }


    }

    /**
     *  检查用户是否登陆,登陆时跳转到登陆页面
     *  $redirect_url 要跳的url (不区别大小写) [str] 例: 'admin/Member/login'
     *  $exception_arth_list [array] 不验证用户登陆的页面地址(不区别大小写) 例:     ['admin/Index/login','admin/member/reg']
     *  $msg 跳转前的提示信息
     */
    protected function checkUserLogin($redirect_url, $exception_arth_list = [], $msg = '')
    {
        if (!is_string($redirect_url) || !is_array($exception_arth_list) || !is_string($msg)) {
            die('传入的参数错误.');
        }
        //获取到当前访问的页面
        $module = MODULE_NAME;//获取当前访问的模块
        $controller = CONTROLLER_NAME;//获取当前访问的控制器
        $action = ACTION_NAME;//获取当前访问的方法
        $current_auth_str = $module . '/' . $controller . '/' . $action; //转成字符串
        //不验证用户登陆的页面
        //把数组里的全部转小写
        if (!empty($exception_arth_list) && is_array($exception_arth_list)) {
            foreach ($exception_arth_list as &$v) {
                if (!is_string($v)) {
                    die('不验证页面数组里的值只能为字符串类型.');
                }
                $v = strtolower($v);
            }
        }
        //当前访问的页面$current_auth_str转为全小写后,如果不在$exception_arth_list客户中就验证用户是否登陆
        if (!empty($exception_arth_list) && is_array($exception_arth_list)) {
            if (!in_array(strtolower($current_auth_str), $exception_arth_list)) {
                if (!session('user_auth')) {
                    if ($msg == '') {
                        $this->redirect($redirect_url);
                    } else {
                        $this->error($msg, $redirect_url);
                    }
                }
            }
        }
    }

    /**
     * 校验权限是否足够
     */
    public function checkRule($adminId,$exception_auth){
        $url = Request::url();
        if(strpos($url,'.')){
            $url = substr($url, 0, strrpos($url, "."));
        }
        if(strpos($url,'?')){
            $url = substr($url, 0, strrpos($url, "?"));
        }
        if(in_array($url,$exception_auth)){
            return true;
        }
        $rbac = new Rbac();//rbac对象
        //判断用户状态
        //如果用户的角色id是1就是超级管理员放行不做任何校验
        $superAdmin = Sql::_find("user_role",['user_id'=>$adminId,'role_id'=>1]);
        if($superAdmin != null){
            return true;
        }
        try {
            $res = $rbac->can($url);
            if($res){
                return true;
            }else{
                return false;
            }
        } catch (Exception $e) {
            return $this->error($e->getMessage(),"admin/index/login");
        }
    }

    /**
     * 页面title
     */
    protected function setMeta($title = '')
    {
        $this->assign('title', $title);
    }

}