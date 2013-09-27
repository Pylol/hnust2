<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>后台管理系统</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/admin.css" />
	<script type="text/javascript" src="__PUBLIC__/Js/jquery.js"></script>
	<script type="text/javascript" src="__PUBLIC__/Js/admin.js"></script>
	
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/administrator.css" />
	<script type="text/javascript" src="__PUBLIC__/Js/administrator.js"></script>

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
	<div id="tablenav">
		<form action="__URL__/administrator" method="get" id="filter">
			<select name="role">
				<option value="all">全部</option>
				<option value="0">管理员</option>
				<option value="1">超级管理员</option>
			</select>
			<input type="submit" value="筛选" class="_submit"/>
		</form>
		<form action="__URL__/adminSearch" method="get" id="search">
			<input type="text" placeholder="用户名、昵称或邮箱" name="key"/>
			<input type="submit" value="查询" class="search-submit"/>
		</form>
	</div>
	<table class="list-table">
		<thead>
			<tr>
				<th class="username">用户名</th>
				<th class="email">邮箱</th>
				<th class="nikename">昵称</th>
				<th class="role">角色</th>
				<?php if($privilege == 1): ?><th class="option">操作</th><?php endif; ?>
			</tr>
		</thead>
		<tbody>
			<?php if(is_array($adminList)): $k = 0; $__LIST__ = $adminList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><tr>
					<td class="username"><?php echo ($vo["adminName"]); ?></td>
					<td class="email"><?php echo ($vo["email"]); ?></td>
					<td class="nikename"><?php echo ($vo["nikeName"]); ?></td>
					<td class="role">
						<?php if($vo["privilege"] == 1): $super = 'selected'; ?>
							<?php $common = ''; ?>
							 <a href="__URL__/administrator/role/1" class="ad">超级管理员</a> 
						<?php else: ?>
							<?php $super = ''; ?>
							<?php $common = 'selected'; ?>
							<a href="__URL__/administrator/role/0" class="ad">管理员</a><?php endif; ?>
						<div class="change_privilege">
							<select id="privilege_item" name="role">
								<option value="0" <?php echo ($common); ?>>管理员</option>
								<option value="1" <?php echo ($super); ?>>超级管理员</option>
							</select>
							<input type="hidden" value="<?php echo ($vo["adminName"]); ?>" id="adname" />
							<a href="#" class="change_cancle">取消</a>
						</div>
					</td>
					<?php if($privilege == 1): ?><td class="option">
							<a href="#" class="edit-privilege">编辑权限</a>
							<a href="__URL__/adminDelete/admin/<?php echo ($vo["adminName"]); ?>" onclick="return confirm('确定要删除该管理员吗？');">删除</a>
						</td><?php endif; ?>
				</tr><?php endforeach; endif; else: echo "" ;endif; ?>
		</tbody>
	</table>
	<a href="__URL__/add" id="addAdmin"><button class="_submit"><font>+</font>添加管理员</button></a>
	<div id="display-num"><p><?php echo (($k)?($k):"0"); ?> 位管理员</p></div>

	</div>
	<div id="foot">
			©musicHnust 2013 版本1.0
	</div>
</body>
</html>