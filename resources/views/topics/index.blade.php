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
                    <li role="presentation"><a href="#">JS</a></li>
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