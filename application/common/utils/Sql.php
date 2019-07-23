<?php
/**
 * @create by: 瑞信科技有限公司
 * @User: hanlidong
 * @Date: 2019/7/15 0015
 * @Time: 20:37
 * @desc: 公共CURD操作工具类
 */
namespace app\common\utils;
use think\Db;

final class  Sql{
    const STATUS_OFF = 2;   //禁用
    const STATUS_ON  = 1;   //启用
    const ROLE_ADMIN = 1;   // 超级管理员
    //是否开启主键
    const PRIMARY_KEY_OFF = false;
    const PRIMARY_KEY_ON = true;

    /**
     * @param $table_name
     * @param array $data
     * @param bool $is_primary
     * @return int|string
     * 插入数据
     */
    public static function _save($table_name,$data = [],$is_primary = self::PRIMARY_KEY_ON){
        if($is_primary === self::PRIMARY_KEY_ON){
            return Db::name($table_name)
                ->insertGetId($data);
        }else{
            return Db::name($table_name)->insert($data);
        }
    }
    /**
     * @param $table_name
     * @param array $where
     * @return int
     * 删除数据
     */
    public static function _del($table_name,$where = []){
        return Db::name($table_name)
            ->where($where)
            ->delete();
    }

    /**
     * @param $table_name
     * @param $key
     * @return int
     * 根据主键删除数据
     */
    public static function _delByKey($table_name,$key){
        return Db::name($table_name)
            ->delete($key);
    }

    /**
     * @param $table_name
     * @param array $where
     * @param array $data
     * @return int|string
     * 更新数据
     */
    public static function _update($table_name,$where = [],$data = []){
        return Db::name($table_name)
            ->where($where)
            ->update($data);
    }

    /**
     * @param $table_name
     * @param array $data
     * @return int|string
     * 根据主键更新数据
     */
    public static function _updateByKey($table_name,$data = []){
        return Db::name($table_name)
            ->update($data);
    }

    /**
     * @param $table_name
     * @param array $where
     * @param string $field
     * @param int $value
     * @return int|true
     * 自增
     */
    public function _setInc($table_name,$where = [],$field = '',$value = 1){
        return Db::name($table_name)
            ->where($where)
            ->setInc($field,$value);
    }

    /**
     * @param $table_name
     * @param array $where
     * @param string $field
     * @param int $value
     * @return int|true
     */
    public function _setDec($table_name,$where = [],$field = '',$value = 1){
        return Db::name($table_name)
            ->where($where)
            ->setDec($field,$value);
    }

    /**
     * @param $table_name
     * @param $where
     * @param $data
     * @return mixed
     * 设置一个字段的值
     */
    public static function _setField($table_name,$where,$data){
        return Db::name($table_name)
            ->where($where)
            ->setField($data);
    }

    /**
     * @param $table_name
     * @param array $where
     * @param array $join
     * @param string $field
     * @param string $order
     * @param string $limit
     * @return false|\PDOStatement|string|\think\Collection
     * 查询数据
     */
    public static function _select($table_name,$where = [],$join=[],$field = '*',$order = '',$limit = ''){
        return Db::name($table_name)
            ->alias('a')
            ->join($join)
            ->where($where)
            ->field($field)
            ->order($order)
            ->limit($limit)
            ->select();
    }

    /**
     * @param $table_name
     * @param array $where
     * @param string $order
     * @param int $page
     * @param array $query
     * @param array $join
     * @param string $filed
     * @param int $currentPage
     * @return \think\Paginator
     * 查询数据带分页
     */
    public static function _selectPage($table_name,$where = [],$order = '',$page = 20,$query = [],$join = [],$filed = '*',$currentPage=1){
        return Db::name($table_name)
            ->alias('a')
            ->field($filed)
            ->join($join)
            ->where($where)
            ->order($order)
            ->paginate($page,false,['query'=>$query,'var_page'=>'page','page'=>$currentPage]);
    }

    /**
     * @param $table_name
     * @param $join
     * @param array $where
     * @param string $field
     * @return mixed
     * 链式操作，查询一条数据
     */
    public static function _joinOne($table_name,$join,$where = [],$field = '*'){
        return Db::name($table_name)
            ->alias('a')
            ->field($field)
            ->join($join)
            ->where($where)
            ->find();
    }

    /**
     * @param $table_name
     * @param array $where
     * @param string $field
     * @return array|false|\PDOStatement|string|\think\Model
     * 查询一条数据
     */
    public static function _find($table_name,$where = [],$field = '*'){
        return Db::name($table_name)
            ->where($where)
            ->field($field)
            ->find();
    }


    /**
     * @param $table_name
     * @param $where
     * @return int|string
     * 统计条数
     */
    public static function _count($table_name,$where){
        return Db::name($table_name)
            ->where($where)
            ->count();
    }

    /**
     * @param $sql
     * @return mixed
     * 执行原生的sql
     */
    public static function _query($sql){
        return Db::query($sql);
    }
    public static function _execute($sql){
        return Db::execute($sql);
    }

}