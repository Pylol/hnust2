<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>完善用户信息 - 科大FM</title>
	<link rel="SHORTCUT ICON" href="__PUBLIC__/Images/favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/cssreset-min.css">
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/userDetail.css">
	<script src="__PUBLIC__/Js/jquery-1.8.3.min.js"></script>
	<link href="__PUBLIC__/Css/font-awesome.css" rel="stylesheet">
	<script src="__PUBLIC__/Js/userDetail.js"></script>
</head>
<body>
	<div class="sideNav">
		<a class="goBack" href="__APP__/Music/fm"><i class="icon-angle-left"></i> 返回主页</a>
		<ul>
			<li class="active">完善信息 <i class="icon-pencil"></i></li>
			<li>更改密码 <i class="icon-unlock-alt"></i></li>
			<li>关于 <i class="icon-info-sign"></i></li>
		</ul>
	</div>
	<div class="contain">
		<div class="completeInfo">
			<h2>完善个人信息</h2>
			<form action="__URL__/updateInfo" method="post" enctype="multipart/form-data">
				<input type="hidden" value="<?php echo (session('user')); ?>" name="userNumber"/>
				<table>
					<tbody>
						<tr>
							<td>
								<div id="localImag">
									<img src="__PUBLIC__/Photos/<?php echo (($userInfo["userNumber"])?($userInfo["userNumber"]):'default'); ?>.jpg"  width="70px" height="70px" alt="个人头像" id="img_prev">
								</div>
							</td>
							<td>
								<label class="userImageLabel" for="userImage">更换头像</label>
							</td>
							<td>	
								<input type="file" id="userImage" value="更换头像" name="photo" onchange="readURL(this)">
							</td>
						</tr>
						<tr>
							<td>
								<label>性别</label>
							</td>
							<td colspan="3">
								<?php if($userInfo["userSex"] == '男'): ?><span>男 </span><input type="radio" name="sex" value="男" checked>
									<span>女 </span><input type="radio" name="sex" value="女">
								<?php else: ?>
									<span>男 </span><input type="radio" name="sex" value="男">
									<span>女 </span><input type="radio" name="sex" value="女" checked><?php endif; ?>
							</td>
						</tr>
						<tr>
							<td>
								<label>出生日期</label>
							</td>
							<td colspan="3">
								<input type="date" name="birthday" value="<?php echo ($userInfo["userBirthday"]); ?>">
								<font>格式: 1975-08-08</font>
							</td>
						</tr>
						<tr>
							<td>
								<label>电子邮件</label>
							</td>
							<td colspan="3">
								<input type="email" name="email" value="<?php echo ($userInfo["userEmail"]); ?>">
							</td>
						</tr>
						<tr>
							<td>
								<label>个人说明</label>
							</td>
							<td colspan="3">
								<textarea name="explanation" id="" cols="50" rows="10"><?php echo ($userInfo["userExplanation"]); ?></textarea>
							</td>
						</tr>
					</tbody>
				</table>
				<button type="submit" id="toSubmitInfo">提交</button>
			</form>
			<div class="error">
				<p>错误提示消息</p>
			</div>
		</div>
		<div class="changePswd">
			<h2>更改密码</h2>
			<form action="__URL__/changePaswd" method="post">
				<input type="password" placeholder="请输入当前密码" name="c_paswd"><br />
				<input type="password" placeholder="请输入新密码" name="n_paswd"><br />
				<input type="password" placeholder="请再次输入" name="ren_paswd"><br />
				<button type="submit" id="toSubmitChange">提交</button>
			</form>
			<div class="error">
				<p>错误提示消息</p>
			</div>
		</div>
		<div class="about">
			<h2>科大FM简历</h2>
			<p class="introduce">科大FM简历描述内容。。。</p>
			<h2>开发人员</h2>
			<ul>
				<li>前端开发：<a href="http://weibo.com/1914017207/profile?topnav=1&wvr=5"><i class="icon-weibo"></i> 周权</a></li>
				<li>后端开发：<a href="http://weibo.com/3119719985/profile?topnav=1&wvr=5"><i class="icon-weibo"></i> 张委</a></li>
				<li>数据库设计：<a href="http://weibo.com/u/2383931420?source=webim"><i class="icon-weibo"></i> 周子领</a></li>
			</ul>
		</div>
		
	</div>

</body>
</html>