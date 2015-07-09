<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>消息添加</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="__PUBLIC__/assets/css/dpl-min.css" rel="stylesheet" type="text/css" />
<link href="__PUBLIC__/assets/css/bui-min.css" rel="stylesheet" type="text/css" />
<link href="__PUBLIC__/assets/css/page-min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="__ROOT__/ueditor/themes/default/ueditor.css"/>
<script type="text/javascript" src="__PUBLIC__/Js/admin/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/admin/simpla.jquery.configuration.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/admin/facebox.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/admin/jquery.wysiwyg.js"></script>
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
        <h3>消息添加</h3>
      </div>
      <div class="panel-body"> 
        <!-- 实例化百度编辑器 -->
        <form action="__URL__/<?php echo ($btn_ok_act); ?>"  method="post"  id="J_Form">
          <p class="subtit">消息标题</p>
          <div>
            <input type="text" id="txtTitle" name="subject" style="width:560px; height:20px; float:left;" maxlength="100" value="<?php echo ($message_item["subject"]); ?>"/>
程度： <select name="level" value="<?php echo ($message_item["level"]); ?>"
	style="width: 50px;">
	<option value="急">急</option>
	<option value="高">高</option>
	<option value="中">中</option>
	<option value="缓">缓</option>
	<option value="慢">慢</option>
</select>
          </div>
          <p class="subtit">消息内容(务必填写)</p>
          <div id="myEditor"> 
            <script type="text/javascript">
				var editor = new baidu.editor.ui.Editor({
				    initialContent: '<?php echo ($message_item["msag"]); ?>'
				});
				editor.render("myEditor");
			</script> 
          </div>
          <br>
          <input type="hidden" value="<?php echo ($message_item["mid"]); ?>" name="mid"/>
          <input type="submit" value="<?php echo ($btn_ok_text); ?>"/>
        </form>
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