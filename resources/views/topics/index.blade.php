@extends('layouts.app')

@section('title', '话题列表')

@section('content')

<div class="row">
    <div class="col-lg-12 col-md-12 topic-list">
		<ul class="breadcrumb">
			<li><a href="#">首页</a></li>
			@if(\Request::getRequestUri() == '/topics-all')
			@else
				@if($category['parent_id'] == 0)
					<li><a href="#">{{$category['name']}}</a></li>
				@else
					@if(isset($parent_info))
						<li><a href="#">{{$parent_info['name']}}</a></li>
						<li class="active">{{$category['name']}}</li>
					@endif
					
				@endif
			@endif
			
			
		</ul>
        <div class="panel panel-default">
            <div class="panel-heading collapse navbar-collapse "  id="example-navbar-collapse">
                <ul class="nav nav-pills navbar-nav">
                    <li role="presentation" ><a href="/topics-all">全部文章</a></li>
					@foreach($cate as $k=>$v)
						@if(isset($v['list']))
							@if(count($v['list'])>0)
								<li dropdown class="{{ active_class((if_route('categories.show') && if_route_param('category', $v['id']))) }} " role="presentation">
									<a class="dropdown-toggle" data-toggle="dropdown" href="#">
										{{$v['name']}}∨
									</a>
									<ul class="dropdown-menu">
										@foreach($v['list'] as $v1)
											<li><a href="{{ route('categories.show', $v1['id']) }}">{{$v1['name']}}</a></li>
										@endforeach
									</ul>
								</li>
							@else
								<li class="{{ active_class((if_route('categories.show') && if_route_param('category', $v['id']))) }}" role="presentation"><a href="{{ route('categories.show', $v['id']) }}">{{$v['name']}}</a></li>
							@endif
						@else
							<li class="{{ active_class((if_route('categories.show') && if_route_param('category', $v['id']))) }}" role="presentation"><a href="{{ route('categories.show', $v['id']) }}">{{$v['name']}}</a></li>
						@endif
                    @endforeach
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