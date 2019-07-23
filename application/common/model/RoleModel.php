<?php
/**
 * @create by: 瑞信科技有限公司
 * @author: hanlidong
 * @Time: 2019/7/18 14:10
 * @desc: （角色）和（角色管理员关联）和(权限) 和(权限分类)，表的模型层
 */

namespace app\common\model;

use app\common\utils\Sql;
use think\Db;
use think\Model;

class RoleModel extends Model
{

    //获取全部启用的角色
    public function getRoles($all = true){
        if($all){
            //如果true返回全部的角色
            return Sql::_select("role");
        }
        else{
            //返回启用的角色
            return Sql::_select("role",['status'=>1]);
        }
    }

    //根据管理员id号获取角色
    public function getRoleByAdminId($adminId){
        return Sql::_find("user_role",['user_id'=>$adminId]);
    }

    //根据管理员的id号删除关联的信息
    public function delAdminRoleByAdminId($adminId){
        return Sql::_del("user_role",['user_id'=>$adminId]);
    }

    //获取角色下的用户
    public function getRoleUser($roleId){
        return Db::name("user_role")->alias("ur")
                ->join("admin a",'ur.user_id = a.admin_id',"left")
                ->where("role_id",$roleId)
                ->select();

    }

    //获取权限分类
    public function getPermissionCate(){
        return Db::name('permission_category')->where('status',1)->select();
    }

    //获取全部权限分类下的权限
    public function getPermission(){
        $categoryPermission = $this->getPermissionCate();
        $data = [];
        foreach ($categoryPermission as $value){
            $categoryPermissionId = $value['id'];
            $permissions = Sql::_select("permission",['status'=>1,'category_id'=>$categoryPermissionId]);
            $value['permissions'] = $permissions;
            array_push($data,$value);
        }
        return $data;
    }

    //根据id号获取role
    public function getRoleById($roleId){
        return Sql::_find("role",['id'=>$roleId]);
    }


}