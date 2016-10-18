@extends('admin/base/base')

@section('title')
订单管理
@endsection

@section('content')
<script>
<<<<<<< HEAD
  //表格居中js
=======
      //表格居中js
>>>>>>> 647f7db4494c59224a414ab1cd184fef53a679a6
  window.onload=function()
  {
    var th=document.getElementsByTagName('th');
    var td=document.getElementsByTagName('td');
    for (var i = 0; i < th.length; i++) {
      th[i].style.textAlign='center'
    };
    for (var i = 0; i < td.length; i++) {
      td[i].style.textAlign='center'
    };
  }
</script>
<section class="content-header">
    <h1>
      订单管理
    </h1>
</section>
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          	<form action="{{ URL('admin/order/order') }}" method='get'>
          		订单号： <input type="text" name='oid'>
          		买家： <input type="text" name='uname'>
          		收货人： <input type="text" name='aname'>
          		收货电话： <input type="text" name='aphone'>
          		订单状态：
          		<select name="state">
          			<option value="">请选择</option>
          			<option value="1">下单未付款</option>
          			<option value="2">已付款</option>
          			<option value="3">已配货</option>
          			<option value="4">已出库</option>
          			<option value="5">交易成功</option>
<<<<<<< HEAD
                         <option value="6">已评价</option>
          			<option value="7">已关闭</option>
=======
          			<option value="6">已评价</option>
>>>>>>> 647f7db4494c59224a414ab1cd184fef53a679a6
          		</select>
          		支付方式：
          		<select name="pay">
          			<option value="">请选择</option>
          			@foreach($pays as $pay)
          			<option value="{{ $pay->id }}">{{ $pay->name }}</option>
          			@endforeach
          		</select>
          		配送方式:
          		<select name="deli">
          			<option value="">请选择</option>
          			@foreach($deli as $del)
          			<option value="{{ $del->id }}">{{ $del->name }}</option>
          			@endforeach
          		</select>
          		<input type="submit" value='查询'>
          	</form>
        </div><!-- /.box-header -->
        <div class="box-body">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
              <tr>
              	<th>订单号</th>
              	<th>订单状态</th>
              	<th>订单总价</th>
              	<th>订单生成时间</th>
              	<th>运费</th>
                <th>买家</th>
                <th>收货人</th>
                <th>收货地址</th>
                <th>收货人电话</th>
                <th>支付方式</th>
                <th>配送方式</th>
                <th>查看详情</th>
                <th>处理</th>
              </tr>
            </thead>
            <tbody>
            	@foreach($list as $li)
              <tr>
                <td>{{ $li->id }}</td>
                <td>
                	@if($li->state=='1')
<<<<<<< HEAD
                		<span class='badge bg-black'>下单未付款</span>
                	@elseif($li->state=='2')
		                <span class='badge bg-red'>已付款</span>
                	@elseif($li->state=='3')
		                <span class='badge bg-blue'>配货中</span>
                	@elseif($li->state=='4')
                		<span class='badge bg-green'>派送中</span>
                	@elseif($li->state=='5')
                		<span class='badge bg-pink'>交易成功 待评价</span>
                	@elseif($li->state=='6')
                         <span class='badge bg-purple'>已评价</span>
                    @elseif($li->state=='7')
                		<span class='badge bg-grey'>已关闭</span>
=======
                		下单未付款
                	@elseif($li->state=='2')
		已付款
                	@elseif($li->state=='3')
		配货中
                	@elseif($li->state=='4')
                		派送中
                	@elseif($li->state=='5')
                		交易成功 待评价
                	@elseif($li->state=='6')
                		已评价
>>>>>>> 647f7db4494c59224a414ab1cd184fef53a679a6
                	@endif
                </td>
                <td>{{ $li->price }}</td>
                <td>{{ $li->addtime }}</td>
                <td>{{ $li->freight }}</td>
                <td>{{ $li->uname }}</td>
                <td>{{ $li->an }}</td>
                <td>{{ $li->ad }}</td>
                <td>{{ $li->ap }}</td>
                <td>{{ $li->pname }}</td>
                <td>{{ $li->dname }}</td>
<<<<<<< HEAD
                <td><a class='badge bg-green' href="order/{{ $li->id }}">查看</a></td>
                <td>
                  @if($li->state=='2')
		              <button class='badge bg-green' onclick='dopeihuo(this.id)' id='{{ $li->id }}'>配货</button>
                  @elseif($li->state=='3')
	                   <button class='badge bg-green' onclick='dochuku(this.value)' value='{{ $li->id }}'>出库</button>
	             @endif
=======
                <td><a href="order/{{ $li->id }}">查看</a></td>
                <td>
                	@if($li->state=='2')
		<button onclick='dopeihuo(this.id)' id='{{ $li->id }}'>配货</button>
                	@elseif($li->state=='3')
	     <button onclick='dochuku(this.value)' value='{{ $li->id }}'>出库</button>
	@endif
>>>>>>> 647f7db4494c59224a414ab1cd184fef53a679a6
                </td>
              </tr>
@endforeach
<tr style='text-align:center'><td colspan='13'>{!! $list->appends(['oid'=>$where['oid'],'uname'=>$where['uname'],'aname'=>$where['aname'],'aphone'=>$where['aphone'],'pay'=>$where['pay'],'deli'=>$where['deli'],'state'=>$where['state']])->render() !!}</td></tr>
            </tbody>
          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row -->
</section><!-- /.content -->
<script>
    function dopeihuo(en)
    {
      if(confirm('真的要配货吗?')){
          //ajax做配货
          $.ajax({
              url:"{{ URL('admin/order/peihuo') }}",
              type:'post',
              data:{'data':en},
              headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              success:function(data)
              {
                alert(data);
                if(data=='配货成功')
                {
                  //刷新页面
                  window.location.reload();
                }
              },
              error:function()
              {
                alert('系统错误');
              }
          });
      };
    }
    function dochuku(en)
    {
      if(confirm('真的要出库吗?'))
      {
          //AJAX做出库
          $.ajax({
              url:"{{ URL('admin/order/chuku') }}",
              type:'post',
              data:{'data':en},
              headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              success:function(data)
              {
                  alert(data);
                  if(data=='出库成功')
                  {
                    //删除此节点
                    // $("button[value='"+en+"']").remove();
                    //刷新页面
                    window.location.reload();
                  }
              },
              error:function()
              {
                  alert('系统错误');
              }
          });
      }
    }
</script>
@endsection
