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
					
                    <li role="presentation"><a href="" >展开 <span class="glyphicon glyphicon-chevron-down"></span></a></li>
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

@endsection 