<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="../../Public/styles/pagination.css" />

	<script type="text/javascript" src="../../Public/js/jquery1.9.1.min.js"></script>
	<script type="text/javascript" src="../../Public/js/jquery.pagination.js"></script>

	</head>
	<body>
		<div class="M-box"></div>
	</body>
	<script type="text/javascript">
		$('.M-box').pagination({
    pageCount:50,
    jump:true,
    coping:true,
    homePage:'首',
    endPage:'末',
    prevContent:'<',
    nextContent:'>'
});
	</script>
</html>