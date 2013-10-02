<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>登录/注册 - 科大FM</title>
	<link rel="SHORTCUT ICON" href="__PUBLIC__/Images/favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/cssreset-min.css">
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/login_Reg.css">
	<script src="__PUBLIC__/Js/jquery-1.8.3.min.js"></script>
	<link href="__PUBLIC__/Css/font-awesome.css" rel="stylesheet">
</head>
<body>
	<div class="container">
		<div class="loginPart">
			<form id="loginForm" action="__URL__/login" method="post">
				<h2>登录</h2>
				<input type="text" id="userNomber" name="userNomber" value="学号" onfocus="if (value =='学号'){value =''}"  
            onblur="if (value ==''){value='学号'}" />
				<input type="password" id="userPaswd" name="userPaswd" value="请输入密码" onfocus="if (value =='请输入密码'){value =''}"  
            onblur="if (value ==''){value='请输入密码'}"  />
				<!-- <input type="text" id="captcha" name="captcha" />
				<img src="" alt="验证码"> -->
				<button type="submit" id="login">登录</button>
			</form>
		</div>
		<div class="regPart" action="/" method="post">
			<form id="regForm" action="__URL__/regist" method="post">
				<h2>新用户注册</h2> 
				<input type="text" id="reg_userNomber" name="reg_userNomber" value="学号" onfocus="if (value =='学号'){value =''}"  
            onblur="if (value ==''){value='学号'}" />
				<input type="password" id="reg_userPaswd" name="reg_userPaswd" value="请输入密码" onfocus="if (value =='请输入密码'){value =''}"  
            onblur="if (value ==''){value='请输入密码'}" />
				<input type="password" id="reg_userPaswdAgain" name="reg_userPaswdAgain" value="请输入密码" onfocus="if (value =='请输入密码'){value =''}"  
            onblur="if (value ==''){value='请输入密码'}" />
				<!-- <input type="text" id="captcha" name="captcha" />
				<img src="" alt="验证码"> -->
				<button type="submit" id="register">注册</button>
			</form>
		</div>
		<div class="conmmon">
			<p>用其他账号登录:</p>
			<ul>
				<li><a href="http://douban.fm/partner/login?target=2"><i class="icon-weibo"></i> 新浪微博(不可用)</a></li>
				<li><a href=""><i class="icon-renren"></i> 人人网(不可用)</a></li>
			</ul>
			<p id="info">还没有账号？</p>
			<button id="info_button">现在注册</button>
		</div>
	</div>
	<div class="intro">
		<img src="__PUBLIC__/Images/defaultCover.jpg" width="140px" height="140px">
 			<?php echo ($Note); ?>
		<p class="footer">版权所有©科大FM•<a href="__ROOT__/admin.php">后台管理</a></p>
	</div>
	<div class="error">
		<p>错误提示消息</p>
	</div>

	<script type="text/javascript">
	$("body").fadeIn(500, function() {
		$(".intro").animate({right: "0px"}, 'slow');
		$("#info_button").toggle(
			function(){
				$(".loginPart").slideUp("400");
				$(".conmmon #info").html("已经拥有账号？");
				$(".conmmon #info_button").html("现在登录");
			},
			function(){
				$(".loginPart").slideDown("400");
				$(".conmmon #info").html("还没有账号？");
				$(".conmmon #info_button").html("现在注册");
			}
			);
		$("#login").click(function(event) {
			/* 验证登录信息 */

			$("#login").html("登录中..");
			var userNomber = $("#userNomber").val();
			var userNomPtn = /^\d{10}$/;
			var userPaswd = $("#userPaswd").val();
			if(userNomber.match(userNomPtn) && userNomber != null){
				$(".errinfo").fadeOut();
				if(userPaswd.length == 0||userPaswd=="请输入密码"){
					$(".error").html("<p>请输入密码!</p>").fadeIn('slow', function() {
						
						$("#login").html("登录");
					});
					event.preventDefault();
				}
				else{
					$.post(
						"__URL__/login",
						{userNomber:userNomber,userPaswd:userPaswd},
						function(data){
							if(data == "0"){
								$(".error").html("<p>用户名或密码不正确</p>").fadeIn('slow',function(){
									$("#login").html("登录");
								});
							}else{
								window.location = "__APP__/Music/fm";
							}
					});
					event.preventDefault();
				}
			}
			else{
				$(".error").html("<p>您输入的学号格式不对，请确保输入的学号为10位数字</p>").fadeIn('slow', function() {
						$("#login").html("登录");
				});
				event.preventDefault();
			}
		});

		$("#register").click(function(event) {
			/* 验证注册信息 */
			$("#register").html("注册中..");
			

			var userNomber = $("#reg_userNomber").val();
			var userNomPtn = /^\d{10}$/;
			var userPaswd = $("#reg_userPaswd").val();
			var userPaswdAgain = $("#reg_userPaswdAgain").val();
			if(userNomber.match(userNomPtn)){
				if(userPaswd.length == 0||userPaswdAgain.length==0||userPaswd=="请输入密码"){
					$(".error").html("<p>请输入密码!</p>").fadeIn('slow', function() {
						$("#register").html("注册");
					});
					event.preventDefault();
				}
				else if(userPaswd!==userPaswdAgain){
					$(".error").html("<p>两次输入的密码不一致!</p>").fadeIn('slow', function() {
						$("#register").html("注册");
					});
					event.preventDefault();
				}
				else{
					$.post(
						"__URL__/regist",
						{userNomber:userNomber,userPaswd:userPaswd},
						function(data){
							if(data != 1){
								$(".error").html("<p>"+ data +"</p>").fadeIn('slow');
								$("#register").html("注册");
							}else{
								$(".error").html("<p>注册成功! 请登录</p>").fadeIn('slow');
								$("#info_button").click();
							}
					});
					event.preventDefault();
				//	$("#info_button").click();
				}
			}
			else{
				$(".error").html("<p>您输入的学号格式不对，请确保输入的学号为10位数字</p>").fadeIn('slow', function() {
					$("#register").html("注册");
				});
				event.preventDefault();
			}
		});
	});
	
	
	</script>
</body>
</html>