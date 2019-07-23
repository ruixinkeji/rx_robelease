<?php
/**
 * @create by: 瑞信科技有限公司
 * @author: hanlidong
 * @Time: 2019/7/18 13:33
 * @desc: 管理员控制层
 */

namespace app\admin\controller;

use app\common\controller\AdminController;
use app\common\facade\AdminModel;
use app\common\facade\RoleModel;
use gmars\rbac\Rbac;
use think\db\exception\DataNotFoundException;
use think\db\exception\ModelNotFoundException;
use think\Exception;
use think\exception\DbException;

class Admin extends AdminController
{
    //管理员列表1111
    public function lists()
    {
        if (IS_GET) {
            $adminUsers = AdminModel::getAdminUsers();
            $this->assign('adminUsers', $adminUsers);
        }
        return view('admin-list');
    }

    //添加管理员
    public function addAdmin()
    {
        if (IS_GET) {
            //返回角色列表
            $roles = RoleModel::getRoles();
        }
        if (IS_POST) {
            $params = $this->param;
            $validateAdmin = new \app\common\validate\Admin();
            if (!$validateAdmin->check($params)) {
                return format_result($validateAdmin->getError(), 2001);
            }
            $admin_phone = $params['admin_phone'];
            if (!empty(AdminModel::getAdminByPhone($admin_phone))) {
                return format_result("管理员电话已存在！", 2001);
            }
            $adminRole = $params['adminRole'];//角色
            if ($adminRole == 0) {
                return format_result("管理员角色必选！", 2001);
            }
            unset($params['/admin/admin/addadmin_html']);
            unset($params['adminRole']);
            $params['admin_password'] = md5($params['admin_password']);
            $params['admin_create_time'] = time();
            $params['admin_module'] = $adminRole == 1 ? 'superadmin' : 'admin';
            //加入管理员表
            $adminId = AdminModel::addAdmin($params);
            //给管理员分配角色
            $rbac = new Rbac();
            try {
                $rbac->assignUserRole($adminId, [$adminRole]);
            } catch (Exception $e) {
            }
            return format_success_result();
        }
        return view('admin-add', ['roles' => $roles]);
    }

    //停用管理员
    public function stopAdmin()
    {
        if (IS_GET) {
            $adminId = input("adminId");
            $res = AdminModel::updateAdmin(['admin_status' => 0], $adminId);
            if ($res > 0) {
                return format_success_result();
            }
            return format_result("停用管理员失败！", 2001);
        }
    }

    //启用管理员
    public function startAdmin()
    {
        if (IS_GET) {
            $adminId = input("adminId");
            $res = AdminModel::updateAdmin(['admin_status' => 1], $adminId);
            if ($res > 0) {
                return format_success_result();
            }
            return format_result("启用管理员失败！", 2001);
        }
    }

    //修改管理员
    public function editAdmin()
    {
        if (IS_GET) {
            $adminId = input("adminId");
            $res = AdminModel::getAdminById($adminId);
            $role = RoleModel::getRoleByAdminId($adminId);
            $res['role'] = $role;
            //返回角色列表
            $roles = RoleModel::getRoles();
        }
        if (IS_POST) {
            $adminId = input("admin_id");
            $params = $this->param;
            $adminRole = $params['adminRole'];//角色
            if ($adminRole == 0) {
                return format_result("管理员角色必选！", 2001);
            }
            unset($params['/admin/admin/editadmin_html']);
            unset($params['adminRole']);
            unset($params['admin_id']);
            $params['admin_password'] = md5($params['admin_password']);
            $params['admin_module'] = $adminRole == 1 ? 'superadmin' : 'admin';
            //修改管理员表
            AdminModel::updateAdmin($params, $adminId);
            //给管理员分配角色
            $rbac = new Rbac();
            try {
                $rbac->assignUserRole($adminId, [$adminRole]);
            } catch (Exception $e) {
            }
            return format_success_result();
        }
        return view(
            'admin-edit',
            ['admin' => $res, 'roles' => $roles]
        );
    }

    //修改管理员密码
    public function changepw()
    {
        $adminId = input('adminId');
        if (IS_GET) {
            $admin = AdminModel::getAdminById($adminId);
        }
        if (IS_POST) {
            $newpassword = input('newpassword');
            $res = AdminModel::updateAdmin(['admin_password' => $newpassword], $adminId);
            if ($res > 0) {
                return format_success_result();
            }
            return format_result("修改密码失败！", 2001);
        }
        return view('admin-change-password', ['admin' => $admin]);
    }

    //删除管理员
    public function delAdmin()
    {
        $adminId = input("adminId");
        //删除管理员并删除一切关联的角色信息
        AdminModel::delAdminById($adminId);
        //删除关联的角色
        RoleModel::delAdminRoleByAdminId($adminId);
        return format_success_result();
    }

    //角色管理列表
    public function roles(){
        $rbac = new Rbac();
        if(IS_GET){
            $data = [];
            try {
                $roles = $rbac->getRole([], true);
                //获取角色下的用户
                foreach ($roles as $role){
                    $admin = RoleModel::getRoleUser($role['id']);
                    $role['admins'] = $admin;
                    array_push($data,$role);
                }
            } catch (DataNotFoundException $e) {
            } catch (ModelNotFoundException $e) {
            } catch (DbException $e) {
            }
        }
        return view('admin-role-list',['roles'=>$data]);
    }

    //添加角色
    public function addRole(){
        if(IS_GET){
            //获取权限和权限分组
            $permissions = RoleModel::getPermission();
        }
        if(IS_POST){
            $params = $this->param;
            $roleName = $params['roleName'];
            $desc = $params['desc'];
            $permission = $params['permission'];//数组array
            if(isset($params,$params['permission'])){
                if(in_array(1,$permission)){//选的超级管理组
                    //超级管理组无需加入任何权限
                    return format_result("此角色不能加入超级管理组",2001);
                }
            }
            $permissionsIds = null;
            foreach ($permission as $value) {
                $permissionsIds .= ',' . (int)$value;
            }
            $newPermissionsIds = substr($permissionsIds, 1, strlen($permissionsIds));
            $rbac = new Rbac();
            $rbac->createRole([
                'name' => $roleName,
                'description' => $desc,
                'status' => 1
            ], $newPermissionsIds);
            return format_success_result();
        }
        return view('admin-role-add',['permissions'=>$permissions]);
    }

    //修改角色
    public function editRole(){
        $roleId = input("roleId");
        if(IS_GET){
            //获取权限和权限分组
            $permissions = RoleModel::getPermission();
            $rbac = new Rbac();
            $role = $rbac->getRole(["id"=>$roleId], true);
        }
        if(IS_POST){
            $params = $this->param;
            $roleName = $params['roleName'];
            $desc = $params['desc'];
            $permission = $params['permission'];//数组array
            if(isset($params,$params['permission'])){
                if(in_array(1,$permission)){//选的超级管理组
                    //超级管理组无需加入任何权限
                    return format_result("此角色不能加入超级管理组",2001);
                }
            }
            $permissionsIds = null;
            foreach ($permission as $value) {
                $permissionsIds .= ',' . (int)$value;
            }
            $newPermissionsIds = substr($permissionsIds, 1, strlen($permissionsIds));
            $rbac = new Rbac();
            $rbac->createRole([
                'id'=>$roleId,
                'name' => $roleName,
                'description' => $desc,
                'status' => 1
            ], $newPermissionsIds);
            return format_success_result();
        }
        return view('admin-role-edit',['permissions'=>$permissions,'role'=>$role[0]]);
    }

    //删除角色
    public function delRole(){
        if(IS_GET){
            $roleId = input("roleId");
            $rbac = new Rbac();
            $rbac->delRole([$roleId]);
            return format_success_result();
        }
        return;
    }

    //权限管理列表
    public function permissions(){
        if(IS_GET){
            //获取权限列表
            $rbac = new Rbac();
            $permissions = RoleModel::getPermission();
            alert($permissions);
        }
        return view('admin-permission');
    }






}