<?php
/**
 * @create by: 瑞信科技有限公司
 * @author: hanlidong
 * @Time: 2019/7/19 16:18
 * @desc: 图文控制层
 */

namespace app\admin\controller;

use app\common\controller\AdminController;
use app\common\facade\BannerModel;
use app\common\facade\MerchantModel;

class Imgtext extends AdminController
{
    //获取轮播图列表
    public function banners(){
        $banners = BannerModel::bannersAll();
        return view('banner-list',['banners'=>$banners]);
    }

    //添加轮播图
    public function addBanner(){
        if(IS_POST){
            $params = $this->param;
            $bannerName = $params['bannerName'];
            $url = $params['url'];
            $sort = $params['sort'];
            $imgUrl = $params['imgUrl'];
            $editorValue = "";
            if(isset($params['editorValue'])){
                $editorValue = $params['editorValue'];
            }
            if($imgUrl == null || $imgUrl == '' || $imgUrl == ""){
                return format_result("轮播封面图必传！",2001);
            }
            $data['banner_name'] = $bannerName;
            $data['banner_url'] = $url;
            $data['banner_order_sort'] = $sort;
            $data['banner_cover'] = $imgUrl;
            $data['banner_create_time'] = time();
            $data['banner_update_time'] = time();
            if($editorValue != ""){
                $data['banner_describe'] = $editorValue;
            }
            //添加轮播
            BannerModel::addBannner($data);
            return format_success_result();
        }
        return view('banner-add');
    }

    //编辑轮播图
    public function editBanner(){
        $bannerId = input('bannerId');
        if(IS_GET){
            $banner = BannerModel::getBannerById($bannerId);
            $banner['banner_cover'] = json_encode([$banner['banner_cover']]);
        }
        if(IS_POST){
            $params = $this->param;
            $bannerId = $params['bannerId'];
            $bannerName = $params['banner_name'];
            $bannerUrl = $params['banner_url'];
            $sort = $params['banner_order_sort'];
            $bannerImg = $params['banner_cover'];
            $editorValue = $params['banner_describe'];
            $res = BannerModel::updateBanner([
                'banner_name'=>$bannerName,
                'banner_url'=>$bannerUrl,
                'banner_order_sort'=>$sort,
                'banner_cover'=>$bannerImg,
                'banner_describe'=>$editorValue
            ],$bannerId);
            if($res>0){
                return format_success_result();
            }
            return format_result("修改失败！",2001);
        }
        return view('banner-edit',['banner'=>$banner]);
    }

    //关于我们公司信息编辑
    public function aboutmy(){
        if(IS_GET){
            $res = MerchantModel::getMerchantInfo();
        }
        return view('merchant-list',['merchant'=>$res]);
    }

    //修改公司信息简介
    public function editAboutMy(){
        if(IS_GET){
            $res = MerchantModel::getMerchantInfo();
        }
        if(IS_POST){
            $params = $this->param;
            $merchantId = $params['merchantId'];
            $merchant_name = $params['merchant_name'];
            $merchant_phone = $params['merchant_phone'];
            $merchant_mobile = $params['merchant_mobile'];
            $merchant_address = $params['merchant_address'];
            $editorValue = $params['editorValue'];
            $res = MerchantModel::updateMerchant([
                'merchant_name'=>$merchant_name,
                'merchant_phone'=>$merchant_phone,
                'merchant_mobile'=>$merchant_mobile,
                'merchant_address'=>$merchant_address,
                'merchant_description'=>$editorValue
            ],$merchantId);
            if($res>0){
                return format_success_result();
            }
            return format_result("修改失败！",2001);
        }
        return view('merchant-edit',['merchant'=>$res]);
    }



}