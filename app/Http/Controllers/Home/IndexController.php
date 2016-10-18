<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{

    //跳转的前台主页的方法
	public function index()
	{

                    $class=\DB::table('goodsclass')->get();
<<<<<<< HEAD
                    $goods=\DB::table('goods')->get();
		return view('home.index',['db'=>$goods,'class'=>$class]);
	}
        //
=======
                    $goods=\DB::table('goods')->where('goods_ground','=','1')->get();
		return view('home.index',['db'=>$goods,'class'=>$class]);
	}
        //头部导航栏控制
>>>>>>> 647f7db4494c59224a414ab1cd184fef53a679a6
        public function head(Request $request)
        {
                $id=$request->data;
                $ob=\DB::table('goods')->where('cid','=',$id)->get();
                return json_encode($ob);
        }

        //商品信息页面
<<<<<<< HEAD
        public function goodsmessage(){
            $class=\DB::table('goodsclass')->get();
                    $goods=\DB::table('goods')->get();
            return view('home.goodsmessage',['db'=>$goods,'class'=>$class]);
        }
=======
        public function goodsmessage($id){
                    // $version=\DB::table('goodsdata')->join('goods','goodsdata.gid','=','goods.id')->where('goodsdata.gid','=',$id)->get();
                    $good=\DB::table('goods')->where('id','=',$id)->first();
                    $version=\DB::table('goodsdata')->where('gid','=',$id)->get();
                    // dd($version);

                    // dd($good);
                    $class=\DB::table('goodsclass')->get();
                    $goods=\DB::table('goods')->get();
            return view('home.goodsmessage',['db'=>$goods,'class'=>$class,'ob'=>$version,'good'=>$good]);
        }
        //商品版本颜色选择
        public function color(Request $request)
        {
                $id=$request->data;
                $color=\DB::table('goodsimage')->where('gdid','=',$id)->get();

                return json_encode($color);
        }

>>>>>>> 647f7db4494c59224a414ab1cd184fef53a679a6
        //购物车页面
        public function cart(){

            $class=\DB::table('goodsclass')->get();
            $goods=\DB::table('goods')->get();
            return view('home.cart',['db'=>$goods,'class'=>$class]);
        }
        //订单页面
        public function order(){
            $class=\DB::table('goodsclass')->get();
            $goods=\DB::table('goods')->get();
            return view('home.order',['db'=>$goods,'class'=>$class]);
        }
        //支付页面
        public function pay(){
            $class=\DB::table('goodsclass')->get();
            $goods=\DB::table('goods')->get();
            return view('home.pay',['db'=>$goods,'class'=>$class]);
        }
        //用户信息页面
        public function user(){
            $class=\DB::table('goodsclass')->get();
            $goods=\DB::table('goods')->get();
            return view('home.user',['db'=>$goods,'class'=>$class]);
        }
        //搜索信息页面
        public function search(){
            $class=\DB::table('goodsclass')->get();
            $goods=\DB::table('goods')->get();
            return view('home.search',['db'=>$goods,'class'=>$class]);
        }
<<<<<<< HEAD
=======
        //商品详情获取
        public function goodsgata(Request $request){
                $id=$request->data;
                $ob=\DB::table('goods')->where('id','=',$id)->first();
                return json_encode($ob);
        }
        //个人地址管理
        public function address(){
                $class=\DB::table('goodsclass')->get();
            $goods=\DB::table('goods')->get();
            return view('home.address',['db'=>$goods,'class'=>$class]);

        }
>>>>>>> 647f7db4494c59224a414ab1cd184fef53a679a6

}
