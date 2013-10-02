<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>后台管理系统</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/admin.css" />
	<script type="text/javascript" src="__PUBLIC__/Js/jquery.js"></script>
	<script type="text/javascript" src="__PUBLIC__/Js/admin.js"></script>
	
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/songs.css" />
	<script type="text/javascript" src="__PUBLIC__/Js/songs.js"></script>

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
		<h2 class="head-title">FM电台<a href="__URL__/upload">上传歌曲</a></h2>
	</div>
	<div id="tablenav">
		<form action="__URL__/musicSearch" method="get" id="filter">
			<select name="class">
				<option value="all">全部</option>
				<?php if(is_array($classList)): $i = 0; $__LIST__ = $classList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["classID"]); ?>"><?php echo ($vo["className"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
			</select>
			<input type="submit" value="筛选" class="_submit"/>
		</form>
		<form id="search" method="get" action="__URL__/musicSearch">
			<input class="search-input" type="text" name="key" placeholder="输入歌名、歌手名">
			<input class="_submit" type="submit" value="搜索">
		</form>
	</div>
	<table class="list-table">
		<thead>
			<tr>
				<th class="name">歌名</th>
				<th class="classification">分类</th>
				<th class="singer">歌手</th>
				<th class="album">专辑</th>
				<th class="pub-date">发布时间</th>
				<th class="option">操作</th>
			</tr>
		</thead>
		<tbody>
			<?php if(is_array($musicList)): $k = 0; $__LIST__ = $musicList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><tr>
					<td class="name">
						<a href="#" onclick="play(<?php echo ($vo["musicID"]); ?>,'<?php echo ($vo["musicName"]); ?>')" title="<?php echo ($vo["URL"]); ?>/<?php echo ($vo["musicID"]); ?>.mp3">
							<?php echo ($vo["musicName"]); ?>
						</a>
					</td>
					<td class="classification"><a href="__URL__/musicSearch/class/<?php echo ($vo["musicClass"]); ?>"><?php echo ($vo["className"]); ?></a></td>
					<td class="singer"><a href="__URL__/musicSearch/key/<?php echo ($vo["musicSinger"]); ?>"><?php echo ($vo["musicSinger"]); ?></a></td>
					<td class="album"><?php echo ($vo["musicAlbum"]); ?></td>
					<td class="pub-date"><?php echo ($vo["musicPub"]); ?></td>
					<td class="option">
						<a href="#" onclick="play(<?php echo ($vo["musicID"]); ?>,'<?php echo ($vo["musicName"]); ?>')">播放</a>
						<a href="__URL__/edit/id/<?php echo ($vo["musicID"]); ?>">编辑</a>
						<?php if($privilege == 1): ?><a href="__URL__/musicDelete/id/<?php echo ($vo["musicID"]); ?>" onclick="return confirm('确定删除该首歌曲?');">删除</a><?php endif; ?>
					</td>
				</tr><?php endforeach; endif; else: echo "" ;endif; ?>
		</tbody>
	</table>
	<div id="display-num"><p><?php echo (($k)?($k):"0"); ?> 首歌曲</p></div>

	</div>
	<div id="foot">
			©musicHnust 2013 版本1.0
	</div>
</body>
</html>