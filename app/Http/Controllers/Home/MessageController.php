<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MessageController extends Controller
{
    //收货地址管理
	public function address()
	{
		 $class=\DB::table('goodsclass')->get();
           $goods=\DB::table('goods')->get();
           return view('home.address',['db'=>$goods,'class'=>$class]);
	}

	//个人中心管理
	public function person()
	{
		$class=\DB::table('goodsclass')->get();
           $goods=\DB::table('goods')->get();
           return view('home.person',['db'=>$goods,'class'=>$class]);
	}
	//查看用户的session
	public function session()
	{
		$id=session()->get('userid');
		dd($id);
	}
}
