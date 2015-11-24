<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>CSV导入</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="__PUBLIC__/assets/css/dpl-min.css" rel="stylesheet" type="text/css" />
<link href="__PUBLIC__/assets/css/bui-min.css" rel="stylesheet" type="text/css" />
<link href="__PUBLIC__/assets/css/page-min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="__ROOT__/ueditor/themes/default/ueditor.css"/>
<script type="text/javascript" src="__ROOT__/ueditor/editor_config.js"></script>
<script type="text/javascript" src="__ROOT__/ueditor/editor_all.js"></script>
<script type="text/javascript" src="__PUBLIC__/assets/js/jquery-1.8.1.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/assets/js/bui.js"></script>
<script type="text/javascript" src="__PUBLIC__/assets/js/config.js"></script>
</head>

<body>
<div class="container">
  <div class="row">
    <noscript>
    <!-- Show a notification if the user has disabled javascript -->
    <div class="notification error png_bg">
      <div> 您好，您的浏览器不支持JavaScript，请打开JavaScript功能 <a href="http://browsehappy.com/" title="Upgrade to a better browser">upgrade</a> your browser or <a href="http://www.google.com/support/bin/answer.py?answer=23852" title="Enable Javascript in your browser">enable</a> Javascript to navigate the interface properly.
        Download From </div>
    </div>
    </noscript>
    <div class="panel">
      <div class="panel-header">
        <h3>导入选项</h3>
      </div>
      <div class="panel-body">
        <p>导入注意事项：</p>
        <p>1、请按照要求做好导出备份事宜。</p>
        <p>2、导出后如需修改表格，请务必将表格另存为.xls/.xlsx后再进行修改。.csv为逗号分隔值（Comma-Separated Values）文件，其文件不会保存任何排版样式。</p>
        <p>3、未尽事宜请联系管理员。<br>
          &nbsp;</p>
        <div class="panel">
          <div class="panel-header">
            <h3>通讯稿件统计导入</h3>
          </div>
          <div class="panel-body">
            <form action="__URL__/<?php echo ($btn_ok_act); ?>"  method="post"  id="J_Form">
              <input type="submit" value="<?php echo ($btn_ok_text); ?>">
              </p>
            </form>
          </div>
        </div>
        <br>
        <div class="panel">
          <div class="panel-header">
            <h3>新闻中心成员信息导入</h3>
          </div>
          <div class="panel-body">
            <form action="__URL__/<?php echo ($btn_ok_act); ?>"  method="post"  id="J_Form">
              <input type="submit" value="<?php echo ($btn_ok_text); ?>">
              </p>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  BUI.use('bui/form',function (Form) {
    var form = new Form.HForm({
      srcNode : '#J_Form'
    });

    form.render();
  });
</script>
</body>
</html>