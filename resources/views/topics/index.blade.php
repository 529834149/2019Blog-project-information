@extends('layouts.app')

@section('title', '话题列表')

@section('content')

<div class="row">
    <div class="col-lg-12 col-md-12 topic-list">
        <div class="panel panel-default">

            <div class="panel-heading">
                <ul class="nav nav-pills">
                    <li role="presentation" class="active"><a href="#">全部文章</a></li>
                    <li role="presentation"><a href="#">PHP</a></li>
                    <li role="presentation"><a href="#">Laravel</a></li>
                    <li role="presentation"><a href="#">Go</a></li>
                    <li role="presentation"><a href="#">Linex</a></li>
                    <li role="presentation"><a href="#">jquery</a></li>
                    <li role="presentation"><a href="#">Vue</a></li>
                    <li role="presentation"><a href="#">移动端</a></li>
                    <li role="presentation"><a href="#">服务端</a></li>
                    <li role="presentation"><a href="#">React</a></li>
                    <li role="presentation"><a href="#">安卓端</a></li>
                    <li role="presentation"><a href="#" style="padding-right: 150px;">互联网前言</a></li>
                    <li role="presentation"><a href="#" >展开 <span class="glyphicon glyphicon-chevron-down"></span></a></li>
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

    
</div>

@endsection