<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" href="../../Public/adcss/recommend.css" />
		<link rel="stylesheet" type="text/css" href="../../Public/adcss/bootstrap.min.css" />  
		<link rel="stylesheet" type="text/css" href="../../Public/styles/pagination.css" />
        <script src="../../Public/js/jquery1.9.1.min.js"></script> 
        <script type="text/javascript" src="../../Public/adjs/recbook.js"></script>
        <script type="text/javascript" src="../../Public/js/jquery.pagination.js"></script>
	</head>
	<body>
		<div class="nav"><h3>小说共享平台后端管理系统</h3></div>
		<div class="content">
			<div class="leftBox">
				<h4>功能菜单</h4>
				<ul>
					<li><span><a href="http://localhost/Admin/index/index">书籍上传管理</a></span></li>
					<li><span><a href="http://localhost/Admin/serbook/serbook">书籍修改管理</a></span></li>
					<li><span><a href="http://localhost/Admin/seruser/seruser">类别上传管理</a></span></li>
				</ul>
			</div>
			<div class="rightBox">
				<div class="rBox" id="container">
					<h3>书籍上传</h3>
					<table  class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>书籍封面</th>
								<th>书籍名称</th>
								<th>书籍类别</th>
								<th>书籍作者</th>
								<th>推荐用户</th>
								<th>应得积分</th>
								<th>书籍链接</th>
								<th>操作</th>
							</tr>
						</thead>					
					</table>
				<table id="tableBox" class="table table-striped table-bordered">
						<tbody id="tdBox">								
						</tbody>						
					</table>
					<div class="M-box"></div>
				</div>
			</div>
		</div>
	</body>
</html>