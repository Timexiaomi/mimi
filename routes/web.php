<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//后台登陆页面
Route::get('admin/login','Admin\loginController@login');
//执行登陆
Route::post('admin/dologin','Admin\loginController@dologin');

//验证码
Route::get('admin/captcha/{tmp}',"Admin\loginController@captcha");

//后台界面
Route::group(["prefix"=>"admin","middleware"=>"user"],function(){

    //首页
    Route::get("index","Admin\IndexController@index");
    //退出登录
    Route::get('loginout',"Admin\loginController@loginout");
    //用户
    Route::resource("user","Admin\UserController");//用户信息管理
    //上传用户头像
    Route::post('/user/photo/{id}',"Admin\UserController@photo");
    //设置用户开关
   Route::get("/dodown/{id}","Admin\UserController@down");
   Route::get("/doopen/{id}","Admin\UserController@open");

   //商品
   Route::resource("goods","Admin\GoodsController");//商品管理

   //商品分类
   Route::resource("goodsclass","Admin\ClassController");//商品类别管理

   //商品版本管理
   Route::get('goods/version/{id}','Admin\GoodsController@version');
   //添加商品版本
   Route::post('goods/doversion',"Admin\GoodsController@doversion");
   //修改商品版本
   Route::post('goods/updateversion/{id}',"Admin\GoodsController@updateversion");

   //版本色彩
   Route::get('version/color/{id}','Admin\GoodsController@color');
   //添加版本色彩
   Route::post('version/color/{id}',"Admin\GoodsController@docolor");

   //获取版本信息的
   Route::get('version/change',"Admin\GoodsController@change");
<<<<<<< HEAD
       //商品类别

   Route::post('version/cccc/',"Admin\GoodsController@change");
=======


   Route::post("color/edit","Admin\GoodsController@coloredit");
>>>>>>> 647f7db4494c59224a414ab1cd184fef53a679a6


    //商品类别

    Route::resource("goodsclass","Admin\ClassController");//商品类别信息管理
    //添加商品子类别
    Route::get("goodsclass/addson/{id?}","Admin\ClassController@create");
    //添加商品类别查询类别的ajax
    Route::get('/select/type',"Admin\ClassController@selectType");

    //添加子类别的ajax
    // Route::post('/addsontype',"Admin\ClassController@addsontype");
    //执行类别删除的ajax
    Route::post('ajax/del',"Admin\ClassController@del");
    //前台模块头部商品
    Route::get('template/top',"Admin\TemplateController@top");

    //执行删除的ajax
    Route::post('ajax/del',"Admin\ClassController@del");

    //订单
    Route::resource('order/order',"Admin\OrderController");
    //AJAX做配货
    Route::post('order/peihuo','Admin\OrderController@peihuo');
    //AJAX做出库
    Route::post('order/chuku','Admin\OrderController@chuku');

    //支付管理
    Route::get('order/pay',"Admin\OrderController@pay");
    //ajax做支付方式修改
    Route::post('pay/edit',"Admin\OrderController@payedit");
    //ajax做支付方式添加
    Route::post('pay/add',"Admin\OrderController@payadd");
    //ajax做支付方式删除
    Route::post('pay/del',"Admin\OrderController@paydel");

    //配送管理
    Route::get('order/delivery',"Admin\OrderController@deli");
    //ajax做配送方式修改
    Route::post('deli/edit',"Admin\OrderController@deliedit");
    //ajax做配送方式添加
    Route::post('deli/add',"Admin\OrderController@deliadd");
    //ajax做配送方式删除
    Route::post('deli/del',"Admin\OrderController@delidel");

<<<<<<< HEAD
    //晒单，评论
    Route::resource('/comment','Admin\CommentController');
    //ajax做回复的删除
    Route::post('/comment/delrep','Admin\CommentController@delrep');
    //ajax做评论的删除
    Route::post('/comment/delcom','Admin\CommentController@delcom');

    //收货地址管理
    Route::resource('/address','Admin\AddressController');
    //收货地址做ajax删除
    Route::post('/address/del','Admin\AddressController@del');

    //后台友情链接
    Route::resource('/blogroll','Admin\BlogrollController');
});

=======

});
Route::get('/aa/1',"Admin\ClassController@del");
>>>>>>> 647f7db4494c59224a414ab1cd184fef53a679a6




//前台需要登录的页面
Route::group(["prefix"=>"home","middleware"=>"home"],function(){

<<<<<<< HEAD
    //订单确认页
    Route::get('home/order','Home\IndexController@order');

    //支付页面
    Route::get('home/pay','Home\IndexController@pay');

    //用户信息页面
    Route::get('home/user','Home\IndexController@user');

});

//收货地址
Route::get('home/address',"Home\MessageController@address");
//前台个人中心
Route::get('home/person',"Home\MessageController@person");


//查看用户的sessionid
Route::get('home/pp',"Home\MessageController@session");
=======
//订单确认页
Route::get('home/order','Home\IndexController@order');

//支付页面
Route::get('home/pay','Home\IndexController@pay');

//用户信息页面
Route::get('home/user','Home\IndexController@user');

});
//用户地址
Route::get('home/address','Home\IndexController@address');

>>>>>>> 647f7db4494c59224a414ab1cd184fef53a679a6
//不需要登录的页面


//前台主页
Route::get('/home/index','Home\IndexController@index');
/*
*注册
*/
//注册页面
Route::get('/home/regi','Home\RegiController@index');
//检查用户是否存在
Route::post('home/regi/checkUser', 'Home\RegiController@checkUser');
//验证码
Route::get('/home/code/{code}','Home\RegiController@code');
//执行注册 验证数据
Route::post("/home/doregi","Home\RegiController@doRegi");
/*
*登陆
*/
//登陆页面
Route::get('/home/login','Home\LoginController@index');
//执行登陆
Route::post('/home/dologin','Home\LoginController@dologin');
<<<<<<< HEAD
//退出登录
Route::get('/home/logout',"Home\LoginController@logout");
=======
>>>>>>> 647f7db4494c59224a414ab1cd184fef53a679a6

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home/head','Home\IndexController@head');

//商品选择页面
<<<<<<< HEAD
Route::get('home/goodsmessage','Home\IndexController@goodsmessage');
=======
Route::get('home/goodsmessage/{id}','Home\IndexController@goodsmessage');

//商品版本颜色查询
Route::get('home/version/color','Home\IndexController@color');
>>>>>>> 647f7db4494c59224a414ab1cd184fef53a679a6

//购物车页面
Route::get('home/cart','Home\IndexController@cart');

//搜索页面
Route::get('home/search','Home\IndexController@search');

<<<<<<< HEAD

=======
//商品信息获取
Route::get('home/goods/data','Home\IndexController@goodsdata');
>>>>>>> 647f7db4494c59224a414ab1cd184fef53a679a6






