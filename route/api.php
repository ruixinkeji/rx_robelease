<?php
/**
 * @create by: 瑞信科技有限公司
 * @author: hanlidong
 * @Time: 2019/7/16 10:07
 * @desc: 接口端路由
 */

use think\facade\Route;


//用户路由和个人中心组
Route::group(":version/user", function () {
    //微信授权
    Route::get("/weChatAuth/:jsCode", 'api/User/weChatAuth');

    //授权登录
    Route::post("/login", "api/User/login");

    //用户基本信息
    Route::get("/info", 'api/User/info')->middleware('token');

    //个人中心
    Route::get("/aboutMy", 'api/User/aboutMy');


});

//首页路由组
Route::group(":version/home", function () {
    //首页轮播
    Route::get("/banners", 'api/Home/banners');

    //轮播图详情
    Route::get("/bannerDetails/:bannerId", 'api/Home/bannerDetails');

    //首页商品一级分类
    Route::get("/categoryLev1", 'api/Home/categoryLev1');

    //首页商品分类下的详情
    Route::get("/categoryGoods/:categoryLev1Id", 'api/Home/categoryGoods');

    //首页热门礼服
    Route::get("/hostGoods", 'api/Home/hostGoods');

    //首页热门礼服更多
    Route::get("/hostGoodsMore/:page/:pageSize", 'api/Home/hostGoodsMore');


});

//分类组路由
Route::group(":version/category", function () {
    //全部二级分类
    Route::get("/lists", 'api/Category/lists');

    //获取二级分类下的商品分页显示
    Route::get("/goods/:categoryId/:page/:pageSize", 'api/Category/goods');


});

//商品路由组
Route::group(":version/goods", function () {
    //商品详情
    Route::get("/details/:goodsId", 'api/Goods/details');

    //立即购买展示要购买的商品
    Route::post("/buy", 'api/Goods/buy')->middleware('token');

    //商品详情立即购买下单预支付单
    Route::post("/advanceOrder", 'api/Goods/advanceOrder')/*->middleware('token')*/;

    //商品详情立即购买支付成功回调地址
    Route::post("/advanceOrderNotifyUrl", 'api/Goods/advanceOrderNotifyUrl');



});

//购物车
Route::group(":version/cart", function () {
    //购物车列表
    Route::get("/cartInfo", 'api/Cart/cartInfo')->middleware('token');

    //物品加入购物车(+)
    Route::get("/add/:goodsId", 'api/Cart/add')->middleware('token');

    //购物车商品数量
    Route::get("/goodsNum", 'api/Cart/goodsNum')->middleware('token');

    //购物车列表
    Route::get("/goodsList", 'api/Cart/goodsList')->middleware('token');

    //清空购物车
    Route::get("/emptyCart", 'api/Cart/emptyCart')->middleware('token');

    //减掉购物车的数量(-)
    Route::get("/minus/:goodsId", 'api/Cart/minus')->middleware('token');

    //移除购物车的商品(批量操作)
    Route::post("/delGoods", 'api/Cart/delGoods')->middleware('token');


});



