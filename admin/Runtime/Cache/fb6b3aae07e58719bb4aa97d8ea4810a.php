<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html>
<head>
<title>页面提示</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv='Refresh' content='<?php echo ($waitSecond); ?>;URL=<?php echo ($jumpUrl); ?>'>
<link href="__PUBLIC__/assets/css/dpl-min.css" rel="stylesheet" type="text/css" />
<link href="__PUBLIC__/assets/css/bui-min.css" rel="stylesheet" type="text/css" />
<link href="__PUBLIC__/assets/css/page-min.css" rel="stylesheet" type="text/css" />   <!-- 下面的样式，仅是为了显示代码，而不应该在项目中使用-->
<link href="__PUBLIC__/assets/css/prettify.css" rel="stylesheet" type="text/css" />
 </head>
<body>
  <div class="container">
    <div class="row">
      <div class="span10">
	<?php if(isset($message)): ?><div class="tips tips-large tips-success">
          <span class="x-icon x-icon-success"><i class="icon icon-ok icon-white"></i></span>
          <div class="tips-content">
            <h2><?php echo ($msgTitle); echo ($message); ?></h2>
	<?php else: ?>
	<div class="tips tips-large tips-warning">
          <span class="x-icon x-icon-error">×</span>
          <div class="tips-content">
            <h2><?php echo ($msgTitle); echo ($error); ?></h2><?php endif; ?>
	
	<p class="auxiliary-text">
	<?php if(isset($closeWin)): ?>页面将在 <span class="wait"><?php echo ($waitSecond); ?></span> 秒后自动关闭，如果不想等待请点击 <a href="<?php echo ($jumpUrl); ?>">这里</a> 关闭
	<?php else: ?>
		页面将在 <span class="wait"><?php echo ($waitSecond); ?></span> 秒后自动跳转，如果不想等待请点击 <a href="<?php echo ($jumpUrl); ?>">这里</a> 跳转<?php endif; ?>
	</div>
	</div>
	</div>
	</div>
</div>
</body>
</html>