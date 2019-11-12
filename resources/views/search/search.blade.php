@extends('layouts.app')

@section('title', '话题列表')

@section('content')

<div class="row">
    <div class="col-lg-12 col-md-12 topic-list">
        <div class="panel panel-default">
            <div class="panel-heading">
                <ul class="nav nav-pills">
					
                    <li role="presentation" ><a href="/topics-all">全部文章</a></li>
				
					@foreach($cate as $k=>$v)
						<li class="{{ active_class((if_route('categories.show') && if_route_param('category', $v['id']))) }}" role="presentation"><a href="{{ route('categories.show', $v['id']) }}">{{$v['name']}}</a></li>
                    @endforeach
					
					<!--<div id="content" style="display: none;"><p>隐藏内容<p><p>隐藏内容<p></div>-->
					<!--<li id="toggle" onclick="showMune();return false;" role="presentation"><a href="javascipt:void(0);" ><span id="texts">展开</span> <span class="glyphicon glyphicon-chevron-down"></span></a></li>-->
					
					<!--
					@if(count($cate) > 11)
						<li  role="presentation"><a href="" >展开 <span class="glyphicon glyphicon-chevron-down"></span></a></li>
					@else
						 <li style="opacity: 0.2" role="presentation"><a href=""   onclick="return false;" style="cursor: default;">展开 <span class="glyphicon glyphicon-chevron-down"></span></a></li>
					@endif
					-->
                    
                </ul>
            </div>
            <div class="panel-heading">
                <ul class="nav nav-pills">
                    <li class="{{ active_class( ! if_query('order', 'recent') ) }}"><a href="{{ Request::url() }}?order=default">浏览最多</a></li>
                    <li class="{{ active_class(if_query('order', 'recent')) }}"><a href="{{ Request::url() }}?order=recent">最新发布</a></li>

                </ul>
            </div>
            <div class="panel-body">
                {{-- 话题列表 --}}
                @include('topics._topic_list', ['topics' => $topics])
                {{-- 分页 --}}
                {!! $topics->appends(Request::except('page'))->render() !!}
            </div>
        </div>
    </div>

   <!--  <div class="col-lg-3 col-md-3 sidebar">
        @include('topics._sidebar')
    </div> -->
</div>
<script src="/default/static/js/jquery.min.js"></script>
<script>
	function showMune(){
		$.ajax({
			url: '/getCategory',//请求地址
			type: 'get',//请求方法
			dataType: 'json',//服务端响应数据类型,跟data没有关系
			data: {},//请求参数
			beforeSend: function(xhr){//请求发去之前触发
			   console.log('before send')
			},
			success: function(data){//请求成功之后触发(响应状态码200)
				console.log(data)
				
			},
			error: function(err){//请求失败触发(响应状态码不为200)
			   console.log(err)
			},
			complete: function(){//请求完成触发(不管成功与否)
			   console.log('request completed')
			} 
	   })
	}
	
</script>
@endsection 