<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>欢迎页</title>
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
      <h2>欢迎使用山东科大信息学院新闻中心管理系统</h2>
      <p>感谢使用本系统，本系统由山东科技大学信息科学与工程学院新闻中心开发，主要用于我院新闻发布、更新及统计工作与院新闻中心内部办公。</p>
      <p>本系统是V0.1 Demo版本，如有系统问题请及时联系系统管理员及开发者：</p>
      <p>Email: <a href="mailto:zhn038@163.com">zhn038@163.com</a> Tel: <a href="tel:13687671402">13687671402</a></p>
    </div>
  </div>
  <div class="panel">
    <div class="panel-header">
      <h3>后台最新消息 <a class="page-action" data-type="reload" href="#">点此刷新</a></h3>
    </div>
    <div class="panel-body">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>ID</th>
            <th>程度</th>
            <th>公告标题</th>
            <th>添加人</th>
            <th>最后修改</th>
          </tr>
        </thead>
        
        <!-- 表内容部分 -->
        <tbody>
          <?php if(is_array($news_list)): $i = 0; $__LIST__ = $news_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
              <td><?php echo ($vo['mid']); ?></td>
              <td><?php echo ($vo['level']); ?></td>
              <td><a class="page-action" href="#" data-href="__ROOT__/index.php/Message/show/mid/<?php echo ($vo['mid']); ?>" title="<?php echo ($vo['subject']); ?>" data-id="me-<?php echo ($vo['mid']); ?>"><?php echo ($vo['subject']); ?></a></td>
              <td><?php echo ($vo['author']); ?></td>
              <td><?php echo ($vo['time']); ?> </td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<script type="text/javascript">
    BUI.use('common/page');
</script>
<body>
</html>