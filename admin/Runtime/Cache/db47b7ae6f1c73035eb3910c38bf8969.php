<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>成员添加</title>
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
        <h3>用户添加</h3>
      </div>
      <div class="panel-body"> 
        <form action="__URL__/<?php echo ($btn_ok_act); ?>"  method="post"  id="U_Form">
		  用户名：<input type="text" name="username" style="width:80px; height:20px;" value="<?php echo ($user_item["username"]); ?>"/><br>
		  密码：<input type="password" name="password" style="width:80px; height:20px;" value="<?php echo ($user_item["password"]); ?>"/><br>
		  再次密码：<input type="password" name="repassword" style="width:80px; height:20px;" value="<?php echo ($user_item["repassword"]); ?>"/><br>
		  验证码：<input type="text" class="text" name="verify">
        <a href="#" class="icons"><img src="__APP__/Common/verify"/ onclick="show(this)"></a>
          <input type="hidden" value="<?php echo ($user_item["id"]); ?>" name="id"/>
          <input type="submit" value="<?php echo ($btn_ok_text); ?>"/>
        </form>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  BUI.use('bui/form',function (Form) {
    var form = new Form.HForm({
      srcNode : '#U_Form'
    });

    form.render();
  });
</script>
</body>
</html>