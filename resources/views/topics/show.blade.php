@extends('layouts.app')

@section('title', $topic->title)
@section('description', $topic->excerpt)

@section('content')

<div class="row">
    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 topic-content">
        <div class="panel panel-default">
            <div class="panel-body">
                <h1 class="text-center">
                    {{ $topic->title }}
                </h1>
                <div class="article-meta text-center">
                    {{ $topic->created_at->diffForHumans() }}
                    ⋅<span class="glyphicon glyphicon-user" aria-hidden="true" style="padding-top:10px;padding-left: 10px"></span>
                    <span class="timeago" title="查看数量">原创</span>
                </div>
                <div class="topic-body">
					{!!$topic->body!!}
					
                  
                </div>

                <div class="operate">
                    <hr>
					<a class="col-lg-5 col-md-5 col-xs-4" ></a>
                    <a class="btn col-xs-4 col-lg-2 col-md-2 " id="likes">
						<button class="btn  btn-primary" ><i class="fa fa-thumbs-up"></i><b id="click_number_{{$topic->id}}">{{$topic->click}}</b>喜欢</button>
                    </a>
                    <a class=" col-lg-5 col-md-5 col-xs-4 " ></a>
                </div>
				<input type="hidden" name="topic_id" value="{{ $topic->id }}">
            </div>
        </div>
    </div>
	<div class="col-lg-3 col-md-3 hidden-sm hidden-xs author-info">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="text-center">
                   社区知识库
                </div>
                <hr>
                <div class="media">
                    <div align="center">
                           <ul class="nav nav-pills">
							@foreach($links as $k=>$v)
							<li style="padding:0px 5px!important;line-height: 1.2!important;"><a target="view_window" href="https://learnku.com/laravel"> {{$k+1}}、{{$v['name']}}</a></li>
							@endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<div class="col-lg-3 col-md-3 hidden-sm hidden-xs author-info">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="text-center">
                   友情博客
                </div>
                <hr>
                <div class="media">
                    <div align="center">
                        <ul class="nav nav-pills">
							@foreach($links2 as $k=>$v)
							<li style="padding:0px 5px!important;line-height: 1.2!important;"><a target="view_window" href="https://learnku.com/laravel"> {{$k+1}}、{{$v['name']}}</a></li>
							@endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="/default/static/js/jquery.min.js"></script>
<script>
// !function(e, t, a) {
    // function r() {
        // for (var e = 0; e < s.length; e++) s[e].alpha <= 0 ? (t.body.removeChild(s[e].el), s.splice(e, 1)) : (s[e].y--, s[e].scale += .004, s[e].alpha -= .013, s[e].el.style.cssText = "left:" + s[e].x + "px;top:" + s[e].y + "px;opacity:" + s[e].alpha + ";transform:scale(" + s[e].scale + "," + s[e].scale + ") rotate(45deg);background:" + s[e].color + ";z-index:99999");
        // requestAnimationFrame(r)
    // }
    // function n() {
        // var t = "function" == typeof e.onclick && e.onclick;
        // e.onclick = function(e) {
            // t && t(),
            // o(e)
        // }
    // }
    // function o(e) {
        // var a = t.createElement("div");
        // a.className = "heart",
        // s.push({
            // el: a,
            // x: e.clientX - 5,
            // y: e.clientY - 5,
            // scale: 1,
            // alpha: 1,
            // color: c()
        // }),
        // t.body.appendChild(a)
    // }
    // function i(e) {
        // var a = t.createElement("style");
        // a.type = "text/css";
        // try {
            // a.appendChild(t.createTextNode(e))
        // } catch(t) {
            // a.styleSheet.cssText = e
        // }
        // t.getElementsByTagName("head")[0].appendChild(a)
    // }
    // function c() {
        // return "rgb(" + ~~ (255 * Math.random()) + "," + ~~ (255 * Math.random()) + "," + ~~ (255 * Math.random()) + ")"
    // }
    // var s = [];
    // e.requestAnimationFrame = e.requestAnimationFrame || e.webkitRequestAnimationFrame || e.mozRequestAnimationFrame || e.oRequestAnimationFrame || e.msRequestAnimationFrame ||
    // function(e) {
        // setTimeout(e, 1e3 / 60)
    // },
    // i(".heart{width: 10px;height: 10px;position: fixed;background: #f00;transform: rotate(45deg);-webkit-transform: rotate(45deg);-moz-transform: rotate(45deg);}.heart:after,.heart:before{content: '';width: inherit;height: inherit;background: inherit;border-radius: 50%;-webkit-border-radius: 50%;-moz-border-radius: 50%;position: fixed;}.heart:after{top: -5px;}.heart:before{left: -5px;}"),
    // n(),
    // r()
// } (window, document);
var a_idx = 0;
jQuery(document).ready(function($) {
    $("#likes").click(function(e) {
		var aid = $('input[name="topic_id"]').val();
		clicks(aid);
        var a = new Array("很欣赏你   ");
        var $i = $("<span/>").text(a[a_idx]);
        a_idx = (a_idx + 1) % a.length;
        var x = e.pageX,
        y = e.pageY;
        $i.css({
            "z-index": 9999999,
            "top": y - 20,
            "left": x,
            "position": "absolute",
            "font-weight": "bold",
            "color": "#FFD700"
        });
        $("body").append($i);
		
        $i.animate({
            "top": y - 180,
            "opacity": 0
        },1500,function() {
            $i.remove();
			
		
			
        });
    });
	
	function clicks(id){
		$.ajax({
			url: '/likes/'+id,//请求地址
			type: 'get',//请求方法
			dataType: 'json',//服务端响应数据类型,跟data没有关系
			data: {aid:id},//请求参数
			beforeSend: function(xhr){//请求发去之前触发
			   console.log('before send')
			},
			success: function(data){//请求成功之后触发(响应状态码200)
		
				$('#click_number_'+id).text(data.data.click_num);
				return false;
				// window.location.href='topics/'+data.data.aid;
			   //data会自动根据服务端响应的Content-Type 自动转为对象
			   //dataType一旦设置就不再关心服务端响应的Content-Type
			   //客户端会主观认为服务端返回的是就是json格式的字符串
			},
			error: function(err){//请求失败触发(响应状态码不为200)
			   console.log(err)
			},
			complete: function(){//请求完成触发(不管成功与否)
			   console.log('request completed')
			} 
	   })
	} 
});

</script>
@stop