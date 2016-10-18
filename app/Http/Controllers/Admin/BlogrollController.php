<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class BlogrollController extends Controller
{
    //管理友情链接的视图
	public function index()
	{
		//查询数据库 取出友情链接的数据
		$list=DB::table('blogroll')->paginate(5);
		return view('admin.blog.index',['list'=>$list]);
	}

	//ajax做友情链接修改
	public function deliedit(Request $r)
	{
		$id=$r->input('data');
		$name=$r->name;
		// return $name;
		//判断是否输入友情链接
		if(!$name)
		{
			return '友情链接不能为空';
		}
		//查询数据库，此友情链接是否存在
		$list=DB::table('blogroll')->where('name','=',$name)->first();
		if($list)
		{
			return '此友情链接已经存在';
		}
		else
		{
			//修改数据库中的数据
			DB::table('blogroll')->where('id','=',$id)->update(['name'=>$name]);
			//取出数据库中id
			return '修改成功';
		}
	}

	//ajax做友情链接的添加
	public function deliadd(Request $r)
	{
		//取出用户输入的值
		$name=$r->data;
		if(!$name)
		{
			return '友情链接不能为空';
		}
		// return $name;
		// 查询数据库，判断name值是否存在
		$list=DB::table('blogroll')->where('name',$name)->first();
		if($list)
		{
			return '友情链接已存在';
		}
		else
		{
			//向数据库中添加数据
			DB::table('blogroll')->insert(['name'=>$name]);
			//查询出添加的id
			$ls=DB::table('blogroll')->where('name','=',$name)->first();
			$id=$ls->id;
			return '添加成功';
		}
	}

	//ajax做友情链接删除
	public function delidel(Request $r)
	{
		$id=$r->data;
		$list=DB::table('blogroll')->where('id','=',$id)->delete();
		if($list)
		{
			return '删除成功';
		}
		else
		{
			return '删除失败';
		}
	}
}
