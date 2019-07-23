<?php
/**
 * @create by: 瑞信科技有限公司
 * @User: hanlidong
 * @Date: 2019/7/15 0015
 * @Time: 20:37
 * @desc: 公共主控制器
 */


namespace app\common\controller;


use think\Controller;

class BaseController extends Controller
{
    protected $url;
    protected $request;
    protected $module;
    protected $controller;
    protected $action;
    protected $param;

    protected function initialize()
    {
        parent::initialize();
        //获取request信息
        $this->requestInfo();
    }

    //请求的参数和定义常量
    protected function requestInfo() {
        $this->param = $this->request->param();
        defined('MODULE_NAME') or define('MODULE_NAME', $this->request->module());
        defined('CONTROLLER_NAME') or define('CONTROLLER_NAME', $this->request->controller());
        defined('ACTION_NAME') or define('ACTION_NAME', $this->request->action());
        defined('IS_POST') or define('IS_POST', $this->request->isPost());
        defined('IS_GET') or define('IS_GET', $this->request->isGet());
        $this->url = strtolower($this->request->module() . '/' . $this->request->controller() . '/' . $this->request->action());
        $this->assign('request', $this->request);
        $this->assign('param', $this->param);
    }


}