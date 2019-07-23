<?php
/**
 * @create by: 瑞信科技有限公司
 * @User: hanlidong
 * @Date: 2019/7/15 0015
 * @Time: 21:40
 * @desc: 管理员模型层
 */


namespace app\common\model;


use app\common\utils\Sql;
use Exception;
use gmars\rbac\Rbac;
use think\Db;
use think\db\exception\DataNotFoundException;
use think\db\exception\ModelNotFoundException;
use think\exception\DbException;
use think\facade\Request;
use think\Model;

class AdminModel extends Model
{

    //管理员登录
    public $errmsg = '';

    public function login($phone, $password)
    {
        $userInfo = Sql::_find("admin",["admin_phone"=>$phone,'admin_status'=>1]);
        if (!$userInfo) {
            $this->errmsg = '管理员不存在或被停用！';
            return false;
        }
        $dbpwd = $userInfo['admin_password'];
        if ($dbpwd != md5($password)) {
            $this->errmsg = '密码错误';
            return false;
        }
        //写入session
        try {
            $this->authlogin($userInfo);
        } catch (Exception $e) {
            $this->errmsg = $e->getMessage();
        }
        return $userInfo;
    }

    //管理员信息写入session
    public function authlogin($data)
    {
        $adminId = $data['admin_id'];
        $authinfo = [
            'id' => $adminId,
            'username' => $data['admin_user_name'],
            'module' => $data['admin_module'],
            'phone' => $data['admin_phone']
        ];
        session("user_auth", $authinfo);
        $request = Request::instance();
        //获取用户的上次登录ip和上次登录时间放入session
        $last_ip = $data['admin_last_ip'];
        $last_time = $data['admin_last_time'];
        $login_count = $data['admin_login_count'];
        if ($last_ip == null && $last_time == null && $login_count == null) {
            //首次登录加入当次的ip和时间并放入session
            $ip = $request->ip();
            $time = time();
            $count = 1;
            $adminData = array(
                'admin_last_ip' => $ip,
                'admin_last_time' => $time,
                'admin_login_count' => $count
            );
            Sql::_update("admin",['admin_id'=>$adminId],$adminData);
            session('adminLoginInfo', $adminData);
        } else {
            //非首次登录直接获取数据中的ip，时间，登录次数
            $adminData = array(
                'admin_last_ip' => $last_ip,
                'admin_last_time' => $last_time,
                'admin_login_count' => ++$login_count
            );
            session('adminLoginInfo', $adminData);
            //更新数据库本次ip地址，时间，次数，为了下次的数据显示
            $adminDatas = array(
                'admin_last_ip' => $request->ip(),
                'admin_last_time' => time(),
                'admin_login_count' => ++$login_count
            );
            Sql::_update("admin",['admin_id'=>$adminId],$adminDatas);
        }
        //将管理的所有权限写入session,加入文件缓存
        $rbac = new Rbac();
        try {
            $rbac->cachePermission($adminId,21600);//6小时后登录信息过期21600
        } catch (DataNotFoundException $e) {
        } catch (ModelNotFoundException $e) {
        } catch (DbException $e) {
        } catch (\think\Exception $e) {
        }
        return true;
    }

    //获取全部的管理员
    public function getAdminUsers(){
        $admins = Sql::_select("admin",[],[],"*","admin_id asc");
        $data = [];
        foreach ($admins as $value){
            $adminId = $value['admin_id'];
            $role = Db::name("user_role")->alias('ur')
                    ->join("role r",'ur.role_id = r.id','left')
                    ->where("ur.user_id",$adminId)
                    ->select();
            $value['roles'] = $role;
            array_push($data,$value);
        }
        return $data;
    }

    //根据电话获取管理员
    public function getAdminByPhone($phone){
        $userInfo = Sql::_find("admin",["admin_phone"=>$phone]);
        return $userInfo;
    }

    //添加管理员
    public function addAdmin($data){
        return Sql::_save("admin",$data);
    }

    //修改管理员
    public function updateAdmin($data,$adminid){
        return Sql::_update("admin",['admin_id'=>$adminid],$data);
    }

    //根据管理员id号获取管理员
    public function getAdminById($adminId){
        return Sql::_find("admin",['admin_id'=>$adminId]);
    }

    //删除管理员
    public function delAdminById($adminId){
        return Sql::_del("admin",['admin_id'=>$adminId]);
    }


}