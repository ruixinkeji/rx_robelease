<?php
/**
 * @create by: 瑞信科技有限公司
 * @User: hanlidong
 * @Date: 2019/7/15 0015
 * @Time: 20:37
 * @desc: 后台主页控制层
 */
namespace app\admin\controller;

use app\common\controller\AdminController;
use app\common\facade\MenuModel;
use app\common\model\AdminModel;
use gmars\rbac\Rbac;
use think\App;

class Index extends AdminController
{
    private $adminModel;

    //ioc和di依赖注入
    public function __construct(AdminModel $adminModel ,App $app = null)
    {
        parent::__construct($app);
        $this->adminModel = $adminModel;
    }

    //后台首页
    public function index()
    {
        $this->assign("menu",MenuModel::setMenu());//设置菜单
        return view();
    }

    //后台欢迎页
    public function welcome(){
        //欢迎页系统信息
        $info = array(
            '操作系统'=>PHP_OS,
            '运行环境'=>$_SERVER["SERVER_SOFTWARE"],
            'PHP运行方式'=>php_sapi_name(),
            '上传附件限制'=>ini_get('upload_max_filesize'),
            '执行时间限制'=>ini_get('max_execution_time').'秒',
            '服务器时间'=>date("Y年n月j日 H:i:s"),
            '北京时间'=>gmdate("Y年n月j日 H:i:s",time()+8*3600),
            '服务器域名/IP'=>$_SERVER['SERVER_NAME'].' [ '.gethostbyname($_SERVER['SERVER_NAME']).' ]',
            '剩余空间'=>round((disk_free_space(".")/(1024*1024)),2).'M',
            'register_globals'=>get_cfg_var("register_globals")=="1" ? "ON" : "OFF",
            'magic_quotes_gpc'=>(1===get_magic_quotes_gpc())?'YES':'NO',
            'magic_quotes_runtime'=>(1===get_magic_quotes_runtime())?'YES':'NO',
        );
        $this->assign('info',$info);
        return view();
    }

    //后台登录
    public function login(){
        $this->setMeta("欢迎登陆礼服租赁系统");
        if (IS_POST) {
            $phone = input('phone');
            $password = input('password');
            $captcha = input('captcha');
            if ($phone == null) {
                return format_result('手机号不能为空！',2001);
            }elseif ($password == null){
                return format_result('密码不能为空！',2001);
            }elseif ($captcha == null){
                return format_result('图形验证码不能为空！',2001);
            }
            //校验图形验证码
            if (!captcha_check($captcha)) {
                return format_result('图形验证码错误！',2001);
            };
            $result = $this->adminModel->login($phone,$password);
            if ($result) {
                return format_result("登录成功！",2000,["jumpUrl"=>"index"]);
            }else{
                return format_result($this->adminModel->errmsg,2001);
            }
        }
        return view();
    }

    //退出登录
    public function logout(){
        $this->setMeta('欢迎登陆礼服租赁系统');
        session('user_auth', null);
        session('adminLoginInfo', null);
        return view("login");
    }

}
