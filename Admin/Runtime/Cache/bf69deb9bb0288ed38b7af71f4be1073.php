<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>后台管理系统</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/admin.css" />
	<script type="text/javascript" src="__PUBLIC__/Js/jquery.js"></script>
	<script type="text/javascript" src="__PUBLIC__/Js/admin.js"></script>
	
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/classification.css" />
	<script type="text/javascript" src="__PUBLIC__/Js/classification.js"></script>

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
	<div id="count">
		<ul class="musicClass">
			<?php if(is_array($classList)): $i = 0; $__LIST__ = $classList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["classID"] != 9): ?><li><a href="__URL__/musicSearch/class/<?php echo ($vo["classID"]); ?>"><?php echo ($vo["className"]); ?> MHz</a></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
			<li><a href="__URL__/musicSearch/class/9">未分类 MHz</a></li>
			<li><a href="__URL__/musicSearch/class/all">全　部 MHz</a></li>
		</ul>
		<ul class="countbar">
			<?php if(is_array($classList)): $k = 0; $__LIST__ = $classList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k; if($vo["classID"] != 9): ?><li style="background:<?php echo ($colorList[$k-1]); ?>; width:<?php echo ($percentList[$k-1]); ?>;">
						<?php echo ($countList[$k-1]); ?>
					</li>
				<?php else: ?>
					<?php $unclassified = $k-1; ?>  <!-- 记录未分类目录的下标 --><?php endif; endforeach; endif; else: echo "" ;endif; ?>
			<!-- 未分类标签 -->
			<li id="sum" style="background:#666364; width:<?php echo ($percentList[$unclassified]); ?>;"> 
				<?php echo ($countList[$unclassified]); ?>
			</li>
			<!-- 全部标签 -->
			<li id="sum" style="background:#A11D03; width:100%;"><?php echo ($sum); ?></li>   
		</ul>

		<p>科大电台音乐数量统计表</p>
	</div>
	<div id="addClass">
		<h2 class="module-head">添加新分类目录</h2>
		<form action="__URL__/addClass" method="post" id="new-class">
			<label>名　称:</label>
			<input type="text" class="new-class-input" name="classname"/>
			<input type="submit" class="_submit" value="添加"/>
		</form>
	</div>
	<div id="opt-class">
		<h2 class="module-head">分类目录</h2>
		<div class="opt-content">
			<p class="description">
				<b>注意：</b>删除分类目录不会把该分类目录下的歌曲一并删除。歌曲会被归入“未分类”分类目录。
			</p>
			<?php if(is_array($classList)): $k = 0; $__LIST__ = $classList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k; if($vo["classID"] != 9): ?><div class="item">
						<font><?php echo ($vo["className"]); ?> MHz</font>
						<form action="__URL__/modifyClass" method="post" name="modifyform">
							<input type="text" name="newClassName"/>
							<input type="hidden" value="<?php echo ($vo["classID"]); ?>" name="classID"/>
							<a href="__URL__/modifyClass/id/<?php echo ($vo["classID"]); ?>" class="modify" >修改</a>
						</form>
						<a href="__URL__/deleteClass/id/<?php echo ($vo["classID"]); ?>" id="delete" onclick="return confirm('确定删除该分类目录吗?');">删除</a>
					</div><?php endif; endforeach; endif; else: echo "" ;endif; ?>
		</div>
	</div>

	</div>
	<div id="foot">
			©musicHnust 2013 版本1.0
	</div>
</body>
</html>