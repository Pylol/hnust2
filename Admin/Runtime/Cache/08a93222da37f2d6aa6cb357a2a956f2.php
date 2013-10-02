<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>后台管理系统</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/admin.css" />
	<script type="text/javascript" src="__PUBLIC__/Js/jquery.js"></script>
	<script type="text/javascript" src="__PUBLIC__/Js/admin.js"></script>
	
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/information.css" />
	<script type="text/javascript" src="__PUBLIC__/Js/information.js"></script>

</head>
<body>
	<div id="adminbar">
		<div class="ad-title"><a href="__ROOT__/index.php">---至诚致志　　惟实唯新</a></div>
		<div class="ad-account" title="我的帐户" href="">
			<div class="welcome">
				您好，<?php echo (session('nikename')); ?>
				<img class="photo" width="16" height="16" src="__PUBLIC__/Images/photo.png" alt="photo">
			</div>
			<div id="admin-user-action">
				<img src="__PUBLIC__/Images/photo1.png" />
				<ul>
					<li><a href=""><?php echo (session('nikename')); ?></a></li>
					<li><a href="__APP__/User/information/admin/<?php echo (session('admin')); ?>">编辑我的个人资料</a></li>
					<lI><a href="__APP__/Manage/logout">登出</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div id="adminmenu">
		<ul class="menulist">
			<li>
				<h2 class="<?php echo ($fm); ?>" onclick=""><img src="__PUBLIC__/Images/icon-radio.png" />FM电台</h2>
				<div class="sub-menu">
					<ul>
						<li class="<?php echo ($songs); ?>"><a href="__APP__/Fm/songs">所有歌曲</a></li>
						<li class="<?php echo ($classification); ?>"><a href="__APP__/Fm/classification" class="">分类目录</a></li>
						<li class="<?php echo ($upload); ?>"><a href="__APP__/Fm/upload">上传歌曲</a></li>
					</ul>
				</div>
			</li>
			<li>
				<h2 class="<?php echo ($chat); ?>" onclick=""><img src="__PUBLIC__/Images/icon-chat.png" />聊天室</h2>
				<div class="sub-menu">
					<ul>
						<li class="<?php echo ($useronline); ?>"><a href="__APP__/Chatroom/useronline">在线用户</a></li>
						<li class="<?php echo ($records); ?>"><a href="__APP__/Chatroom/records">聊天记录</a></li>
					</ul>
				</div>
			</li>
			<hr style="float: left;border:2px solid #999;width:100%"/>
			<li>
				<h2 class="<?php echo ($user); ?>" onclick=""><img src="__PUBLIC__/Images/icon-user.png" />帐户管理</h2>
				<div class="sub-menu">
					<ul>
						<li class="<?php echo ($users); ?>"><a href="__APP__/User/users">所有用户</a></li>
						<li class="<?php echo ($administrator); ?>"><a href="__APP__/User/administrator">管理员</a></li>
						<li class="<?php echo ($information); ?>"><a href="__APP__/User/information/admin/<?php echo (session('admin')); ?>">我的个人资料</a></li>
					</ul>
				</div>
			</li>
		</ul>
		<div style="clear:both"></div>	
	</div>
	<div id="body-content">
		
	<div id="head">
		<div id="icon"></div>
		<h2 class="head-title">帐户管理</h2>
	</div>
	<h2 id="head-title">个人资料编辑</h2>
	<form action="__URL__/adminUpdate" method="post" id="infoform">
		<span>
			<label>用户名</label>
			<input type="text" value="<?php echo ($admin["adminName"]); ?>" readonly name="adminname"/>
			　　用户名不可更改
		</span>
		<span>
			<label>姓名</label>
			<input type="text" value="<?php echo ($admin["name"]); ?>" name="name"/>
		</span>
		<span>
			<label>昵称</label>
			<input type="text" value="<?php echo ($admin["nikeName"]); ?>" name="nikename"/>
			(<font color="red">*</font>)　用于显示的名称
		</span>
		<span>
			<label>邮箱</label>
			<input type="text" value="<?php echo ($admin["email"]); ?>" name="email"/>
			(<font color="red">*</font>)
		</span>
		<h2>重置密码</h2>
		<span>
			<label>新密码</label>
			<input type="password" value="" name="passwd"/>
		</span>
		<span>
			<label>重复新密码</label>
			<input type="password" value="" name="repasswd"/>
		</span>
		<input type="submit" value="更新个人资料" id="submit"/>
	</form>

	</div>
	<div id="foot">
			©musicHnust 2013 版本1.0
	</div>
</body>
</html>