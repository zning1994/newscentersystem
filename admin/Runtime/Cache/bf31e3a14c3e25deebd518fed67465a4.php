<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo ($message_item["subject"]); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="__PUBLIC__/assets/css/dpl-min.css" rel="stylesheet" type="text/css" />
<link href="__PUBLIC__/assets/css/bui-min.css" rel="stylesheet" type="text/css" />
<link href="__PUBLIC__/assets/css/page-min.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="__PUBLIC__/assets/js/jquery-1.8.1.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/assets/js/bui-min.js"></script>
<script type="text/javascript" src="__PUBLIC__/assets/js/config-min.js"></script>
<style type="text/css">
code {
	padding: 0px 4px;
	color: #d14;
	background-color: #f7f7f9;
	border: 1px solid #e1e1e8;
}
</style>
</head>
<body>
<div class="container">
  <div class="row">
    <div class="span20">
      <h2><?php echo ($message_item["subject"]); ?></h2>
      <p><b>程度：</b><?php echo ($message_item["level"]); ?> &nbsp;&nbsp;<b>更新时间：</b><?php echo ($message_item["time"]); ?></p>
      <p><b>作者：</b><?php echo ($message_item["author"]); ?></p>
      <p><b>内容：</b></p>
      <?php echo ($message_item["msag"]); ?>
    </div>
  </div>
</div>
<script type="text/javascript">
    BUI.use('common/page');
  </script>

<body>
</html>