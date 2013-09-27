<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>释放青春 - 科大FM</title>
	<link rel="SHORTCUT ICON" href="__PUBLIC__/Images/favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/cssreset-min.css">
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/fm.css">
	<script src="__PUBLIC__/Js/jquery-1.7.1.min.js"></script>
	<script type="text/javascript" src="__PUBLIC__/Js/jQueryRotate.js"></script>
	<script src="__PUBLIC__/Js/mediaelement-and-player.min.js"></script>
	<script src="__PUBLIC__/Js/music.js"></script>
	<link href="__PUBLIC__/Css/font-awesome.css" rel="stylesheet">

</head>
<body>
	<input type="hidden" value="<?php echo (session('user')); ?>" id="userNo" />
	<div id="section1">
		<div class="userInfo">
			<p><i class="icon-heart"></i> 你已收藏 <span><?php echo (($collection)?($collection):0); ?></span> 首歌曲</p> | <a href="__APP__/Manage/logout"><i class="icon-off"></i> 退出</a>| <a href="__APP__/Manage/userDetail"><i class="icon-cog"></i> 设置</a>
		</div>
		<div class="logo">
			<a href="" title="科大FM">科大FM</a>
		</div>

		<div class="audio-player">
			<div class="cover">
				<div class="play">
					<a href="#" class="playCtl"></a>
				</div>
				<img id="coverImage" src="__PUBLIC__/Images/defaultCover.jpg" />
			</div>
			<div class="songInfo">
				<input type="hidden" id="musicID" value="">
				<h2 id="musicSinger">获取数据中，请稍后..</h2>
				<span id="musicAlbum">获取数据中，请稍后..</span>
				<h2 id="musicName">获取数据中，请稍后..</h2>
				<span id="like" class="icon" title="收藏"><i class="icon-heart icon-2x"></i></span>
				<span id="hate" class="icon" title="删除"><i class="icon-trash icon-2x"></i></span>
				<span id="nextSong" class="icon" title="下一首"><i class="icon-fast-forward icon-2x"></i></span>
			</div>
			<audio id="audio-player" src="__PUBLIC__/Songs/27.mp3" type="audio/mp3" controls="controls"></audio>
		</div>
	</div>
	<!-- end of section1 -->
	<div id="listMain">
		<div id="listContainer">
			<div class="list">
				<ul>
					<li id="0"><i class="icon icon-heart" style="color:#e74c3c"></i> 喜欢</li>
					<?php if(is_array($classList)): $i = 0; $__LIST__ = $classList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["classID"] != 9): if($vo["classID"] == 1): ?><li class="active" id="<?php echo ($vo["classID"]); ?>"><?php echo ($vo["className"]); ?></li>
							<?php else: ?>
								<li id="<?php echo ($vo["classID"]); ?>"><?php echo ($vo["className"]); ?></li><?php endif; endif; endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>	
		</div>
	</div>
	<!-- end of listMain -->
		<div id="sidebar">
		<div id="sidebarMain">
			<div id="newsPic">
				<ul>
					<li><img src="" alt="校园新闻" /></li>
					<li><img src="" alt="校园新闻" /></li>
					<li><img src="" alt="校园新闻" /></li>
				</ul>
			</div>
		</div>
		<div id="sidebarCtl">
			<div class="ctlBtn">
				<span><i class="icon-chevron-right"></i></span>
			</div>
		</div>
	</div>
	<!-- end of sidebar -->
	<div id="chatroom">
		<div class="chatRoomHeader">
			<!-- 电台聊天室 -->
			<img src="__PUBLIC__/Photos/<?php echo ($userPhoto); ?>.jpg" width="70px" height="70px">
			<h3><?php echo (session('username')); ?></h3>
			<p>-<?php echo (($userExplanation)?($userExplanation):"该用户还没有填写个性签名."); ?></p>
			<span id="chatRoomCtl" title="展开"><i class="icon-angle-up icon-2x"></i></span>
		</div>
		<div class="chatRoomRcv">
		</div>

		<div class="chatRoomSend">
			<input id="msgContent" type="text" name="msgContent" placeholder="请输入消息." />
			<input id="sendMsg" type="submit" name="sendMsg" value="发送" title="发送消息" />
		</div>
	</div>
	<!-- end of chatroom -->
	<div id="wrap">
		<div class="linkArea">
			<a href="http://hnust.0xiao.com/shop/index.html"  target="_blank"><i class="icon-shopping-cart"></i> 校园购物</a>
			<a href="http://www.hnust.edu.cn/ShowContent.asp?ArtFlag=xxjj" target="_blank"><i class="icon-smile"></i> 了解科大</a>
		</div>
	</div>
	<!-- end of wrap -->


</body>
</html>