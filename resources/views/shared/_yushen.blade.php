	<script>
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- //Meta tag Keywords -->
    <!-- <link rel="stylesheet" href="/default/backdrop-concise/css/bootstrap.css"> -->
    
    <!-- Bootstrap-Core-CSS -->
    <link rel="stylesheet" href="/default/backdrop-concise/css/style.css?{{time()}}" type="text/css" media="all" />
    <!-- Style-CSS -->
    <!--  <link href="/default/backdrop-concise/css/font-awesome.css?{{time()}}" rel="stylesheet"> -->
   
    <!-- //font-awesome-icons -->
    <!-- /Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800" rel="stylesheet">
    <!-- //Fonts -->
 <!-- mian-content -->
<div class="main-banner" id="home">

	<!--/banner-->
	<div class="banner-info">
		
		<div class="middile-inner-con">
			<section class="inner-w3layouts-wrap">
					<h4>抱歉。文章还在审核中......<br><br>请稍后在访问！正在为您跳转到首页中<span id="mes" style="color:green"></span>秒</h4>
			</section>
			<div class="tab-main mx-auto">
				<label><span class="fa fa-home" aria-hidden="true"></span><a target="_blank" href="/">文章列表</a></label>
				
			</div>
			<!--// banner-inner -->
		</div>
	</div>
	
</div>
<script language="javascript" type="text/javascript">
	var i = 5;
	var intervalid;
	intervalid = setInterval("fun()", 1000);
	function fun() {
		if (i == 0) {
			window.location.href = "/topics-all";
			clearInterval(intervalid);
		}
		document.getElementById("mes").innerHTML = i;
		i--;
	}
</script>