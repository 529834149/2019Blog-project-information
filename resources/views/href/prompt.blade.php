<!DOCTYPE html>
<html lang="zh-cn" >
<head>
    <meta charset="UTF-8">
    <title>提示_通用平台</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/bootstrap/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="//cdn.bootcss.com/font-awesome/4.2.0/css/font-awesome.min.css"/>
    <!-- Ionicons -->
    <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/bootstrap/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/bootstrap/dist/css/skins/_all-skins.min.css">
 
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="/bootstrap/js/html5shiv.min.js"></script>
    <script src="/bootstrap/js/respond.min.js"></script>
    <![endif]-->
    <!-- Google Font -->
    <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/bootstrap/css/googlefonts.css">
    <style>
        .color-palette {
            height: 35px;
            line-height: 35px;
            text-align: center;
        }
        .color-palette-set {
            margin-bottom: 15px;
        }
        .color-palette span {
            display: none;
            font-size: 12px;
        }
        .color-palette:hover span {
            display: block;
        }
        .color-palette-box h4 {
            position: absolute;
            top: 100%;
            left: 25px;
            margin-top: -40px;
            color: rgba(255, 255, 255, 0.8);
            font-size: 12px;
            display: block;
            z-index: 7;
        }
    </style>
</head>
<body>
<div style="margin:auto; width: 50%; height: auto; overflow: hidden;">
    <div class="box box-default" style="margin-top: 20%;">
        <div class="box-header with-border">
            <i class="fa fa-bullhorn"></i>
            <h3 class="box-title">提示</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            @if ($data['status']=='error')
            <div class="callout callout-danger">
                <h4>错误</h4>
                <p>{{$data['message']}}</p>
                <p>浏览器页面将在<b id="loginTime_error">{{ $data['jumpTime'] }}</b>秒后跳转......<a href="javascript:void(0);" class="jump_now">立即跳转</a> </p>
            </div>
            @endif
            @if ($data['status']=='continue')
            <div class="callout callout-info">
                <h4>未完成，继续</h4>
                <p>{{$data['message']}}</p>
                <p>浏览器页面将在<b id="loginTime_continue">{{ $data['jumpTime'] }}</b>秒后跳转......<a href="javascript:void(0);" class="jump_now">立即跳转</a> </p>
            </div>
            @endif
            @if ($data['status']=='warning')
            <div class="callout callout-warning">
                <h4>警告</h4>
                <p>{{$data['message']}}</p>
                <p>浏览器页面将在<b id="loginTime_warning">{{ $data['jumpTime'] }}</b>秒后跳转......<a href="javascript:void(0);" class="jump_now">立即跳转</a> </p>
            </div>
            @endif
            @if ($data['status']=='success')
            <div class="callout callout-success">
                <h4>成功</h4>
                <p>{{$data['message']}}</p>
                <p>浏览器页面将在<b id="loginTime_success">{{ $data['jumpTime'] }}</b>秒后跳转......<a href="javascript:void(0);" class="jump_now">立即跳转</a> </p>
            </div>
            @endif
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>
</body>
</html>
<!-- jQuery 3 -->
<script src="{{ asset('js/app.js') }}?{{time()}}"></script>
<!--本页JS-->
<script type="text/javascript">
    $(function(){
        //循环倒计时，并跳转
        var url = "{{ $data['url'] }}";
        var loginTimeID='loginTime_'+'{{$data['status']}}';
        //alert(loginTimeID);return;
        var loginTime = parseInt($('#'+loginTimeID).text());
        console.log(loginTime);
        var time = setInterval(function(){
            loginTime = loginTime-1;
            $('#'+loginTimeID).text(loginTime);
            if(loginTime==0){
                clearInterval(time);
                window.location.href=url;
            }
        },1000);
    });
    //点击跳转
    $('.jump_now').click(function () {
        var url = "{{ $data['url'] }}";
        window.location.href=url;
    });
</script>