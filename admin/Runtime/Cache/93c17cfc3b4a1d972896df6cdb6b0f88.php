<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>通讯管理</title>
<link href="__PUBLIC__/assets/css/dpl-min.css" rel="stylesheet" type="text/css" />
<link href="__PUBLIC__/assets/css/bui-min.css" rel="stylesheet" type="text/css" />
<link href="__PUBLIC__/assets/css/page-min.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="__PUBLIC__/Js/admin/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/admin/simpla.jquery.configuration.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/admin/facebox.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/admin/jquery.wysiwyg.js"></script>
<script type="text/javascript" src="__PUBLIC__/assets/js/jquery-1.8.1.min.js"></script> 
<script type="text/javascript" src="__PUBLIC__/assets/js/bui-min.js"></script> 
<script type="text/javascript" src="__PUBLIC__/assets/js/config-min.js"></script> 
</head>

<body>
<div class="container content">
  <noscript>
  <!-- Show a notification if the user has disabled javascript -->
  <div class="notification error png_bg">
    <div> Javascript is disabled or is not supported by your browser. Please <a href="http://browsehappy.com/" title="Upgrade to a better browser">upgrade</a> your browser or <a href="http://www.google.com/support/bin/answer.py?answer=23852" title="Enable Javascript in your browser">enable</a> Javascript to navigate the interface properly.
      Download From </div>
  </div>
  </noscript>
  <div class="row">
    <div class="panel" >
      <div class="panel-header">
        <h3>通讯管理</h3>
      </div>
      <ul class="content-box-tabs">
        <br>
        <li>
          <h1>本年度已统计共<?php echo ($news_count); ?>篇通讯稿  <a class="page-action" data-type="reload" href="#">点此刷新</a></h1>
        </li>
        <br>
      </ul>
      <div class="clear"></div>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>ID</th>
            <th>文章标题</th>
            <th>通讯作者</th>
            <th>发稿时间</th>
            <th>字数</th>
            <th>科大报稿件</th>
            <th>科大报期数</th>
            <th>添加人</th>
            <th>最后修改</th>
            <th>选项</th>
          </tr>
        </thead>
        
        <!-- 表内容部分 -->
        <tbody>
          <?php if(is_array($news_list)): $i = 0; $__LIST__ = $news_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
              <td><?php echo ($vo['id']); ?></td>
              <td><?php echo ($vo['subject']); ?> </td>
              <td><?php echo ($vo['zuozhe']); ?> </td>
              <td><?php echo ($vo['opendate']); ?> </td>
              <td><?php echo ($vo['wordss']); ?></td>
              <td><?php echo ($vo['kedabao']); ?></td>
              <td><?php echo ($vo['kdbqishu']); ?></td>
              <td><?php echo ($vo['author']); ?></td>
              <td><?php echo ($vo['lastmodifytime']); ?> </td>
              <td><!-- Icons --> 
                <a href="__URL__/edit/id/<?php echo ($vo['id']); ?>" title="编辑"><img src="__PUBLIC__/Images/admin/icons/pencil.png" alt="编辑" /></a> <a href="__URL__/delete/id/<?php echo ($vo['id']); ?>" title="删除"><img src="__PUBLIC__/Images/admin/icons/cross.png" alt="删除" /></a></td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<script type="text/javascript">
    BUI.use('common/page');
  </script>
</body>
</html>