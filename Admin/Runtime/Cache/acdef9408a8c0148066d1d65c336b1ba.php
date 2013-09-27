<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>后台管理系统</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/admin.css" />
	<script type="text/javascript" src="__PUBLIC__/Js/jquery.js"></script>
	<script type="text/javascript" src="__PUBLIC__/Js/admin.js"></script>
	
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/upload.css" />
	<script type="text/javascript" src="__PUBLIC__/Js/upload.js"></script>

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
		<h2 class="head-title">FM电台</h2>
	</div>
	<div id="upload">
		<h2 class="module-head">上传文件</h2>
		<form action="__URL__/uploadmusic" method="post" id="upload-info" enctype="multipart/form-data">
			<span>
				<p><b>注意:</b>上传的音乐文件格式只能为(.mp3)格式，封面图片文件只能为(.jpg)格式，否则无法上传</p>
			</span>
			<span>
				<label>文　　件:</label>
				<input type="text"  id="scan-fileaddr"/>
				<input type="button" value="浏览" class="scan" id="bt-scan"/>
				<input type="file" style="display:none" id="file" name="music"/>
			</span>
			<span>
				<label>分类目录:</label>
				<select name="musicclass">
					<?php if(is_array($classList)): $i = 0; $__LIST__ = $classList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["classID"]); ?>"><?php echo ($vo["className"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
				</select>
			</span>
			<span>
				<label>歌　　名:</label>
				<input type="text" name="musicname"/>
				　　歌曲存储到服务器上目的文件夹下的名称
			</span>
			<span>
				<label>歌　　手:</label>
				<input type="text" name="musicsinger"/>
				　　歌手名或者为乐团、组合名称
			</span>
			<span>
				<label>专　　辑:</label>
				<input type="text" name="musicalbum"/>
				　　单曲则填写为歌名
			</span>
			<span>
				<label>发布时间:</label>
				<input type="text" name="musicpub"/>
				　　格式为:1975-1-1
			</span>
			<span>
				<label class="cover-label">封　　面:</label>
				<div id="localImag">
					<img src="" id="img_prev" alt="封面图片"/>
				</div>
				<input type="button" value="浏览" class="scan" id="img-scan"/>
				<input type="file"  style="height:0px;border:0px;width:0px;" title="" id="doc" onchange="readURL(this)" name="image"/>
			</span>
			<span>
				<label>目的地址:</label>
				<input type="text" readonly id="edit-input" name="musicurl" value="/Public/Songs/"/>
				<a href="#" class="edit">编辑</a>
			</span>
			<input type="submit" value="上传歌曲" class="_submit"/>
		</form>
	</div>

	</div>
	<div id="foot">
			©musicHnust 2013 版本1.0
	</div>
</body>
</html>