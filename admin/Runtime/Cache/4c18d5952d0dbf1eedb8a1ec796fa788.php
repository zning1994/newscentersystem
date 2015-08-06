<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo ($title); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="__PUBLIC__/assets/css/dpl-min.css" rel="stylesheet" type="text/css" />
<link href="__PUBLIC__/assets/css/bui-min.css" rel="stylesheet" type="text/css" />
<link href="__PUBLIC__/assets/css/main-min.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="__PUBLIC__/assets/js/jquery-1.8.1.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/assets/js/bui.js"></script>
<script type="text/javascript" src="__PUBLIC__/assets/js/config.js"></script>
</head>
<body>
<div class="header">
  <div class="dl-title"> <span class="lp-title-port">山东科大信息学院新闻中心管理系统</span> </a> </div>
  <div class="dl-log">欢迎您，<span class="dl-log-user"  title="当前用户:<?php echo ($username); ?>"><?php echo ($username); ?></span><a href="__URL__/quit" title="退出系统" class="dl-log-quit">[退出]</a> </div>
</div>
<div class="content">
  <div class="dl-main-nav">
    <ul id="J_Nav"  class="nav-list ks-clear">
      <li class="nav-item dl-selected">
        <div class="nav-item-inner nav-home">首页</div>
      </li>
      <li class="nav-item">
        <div class="nav-item-inner nav-order">通讯</div>
      </li>
      <li class="nav-item">
        <div class="nav-item-inner nav-supplier">成员</div>
      </li>
      <li class="nav-item">
        <div class="nav-item-inner nav-inventory">消息</div>
      </li>
    </ul>
  </div>
  <ul id="J_NavContent" class="dl-tab-conten">
  </ul>
</div>
<script>
    BUI.use('common/main',function(){
      var config = [{
          id:'menu', 
          homePage : 'welcome',
          menu:[{
              text:'欢迎',
              items:[
			  	{id:'welcome',text:'后台首页',href:'__ROOT__/index.php/Index/welcome',closeable : false},
              ]
            },{
              text:'设置操作',
              items:[
                {id:'articlefix',text:'通讯设置',href:'__ROOT__/index.php/Index/fixit'},
                {id:'memberfix',text:'成员设置',href:'__ROOT__/index.php/Index/fixit'},
                {id:'messagefix',text:'消息设置',href:'__ROOT__/index.php/Index/fixit'} 
              ]
            },{
              text:'导出导入',
              items:[
                {id:'coutfix',text:'导出选项',href:'__ROOT__/index.php/Outexcel/index'}, 
                {id:'cinfix',text:'导入选项',href:'__ROOT__/index.php/Inexcel/index'}
              ]
            }]
          },{
            id:'mesg',
			homePage : 'messagefix',
            menu:[{
                text:'通讯管理',
                items:[
                  {id:'messagefix',text:'通讯管理',href:'__ROOT__/index.php/Articlefix',closeable : false},
                  {id:'messagein',text:'通讯添加',href:'__ROOT__/index.php/Article/index'},
                  {id:'pictures',text:'照片管理',href:'__ROOT__/index.php/Index/fixit'},
                  {id:'mail',text:'邮箱管理',href:'__ROOT__/index.php/Index/163'}
                ]
              },{
                text:'通讯网站发布',
                items:[
                  {id:'sdkdnews',text:'发布到科大新闻网',href:'http://www.sdkd.net.cn/admin/'},
                  {id:'cise',text:'发布到学院网',href:'http://cise.sdust.edu.cn/web2010/admincp.php'},
                  {id:'bjx',text:'发布到北极星网',href:'http://bjx.sdkd.net.cn/admin/'},
                  {id:'xgc',text:'发布到学工处',href:'__ROOT__/index.php/Index/xgcsb'}//直接跳转
                ]
              },{
                  text:'通讯网站浏览',
                  items:[
                    {id:'kdnews',text:'科大新闻网',href:'http://news.sdust.edu.cn/index__SDUST44.htm'},
                    {id:'kdnewspaper',text:'科大报',href:'http://news.sdust.edu.cn/index__NEWS6.htm'}
                    ]
              }]
          },{
            id:'memb',
			homePage : 'memfix',
            menu:[{
                text:'成员管理',
                items:[
                  {id:'memfix',text:'成员管理',href:'__ROOT__/index.php/User/manage',closeable : false},
                  {id:'memin',text:'成员添加',href:'__ROOT__/index.php/User/index'}
                ]
              }]
          },{
            id:'text',
			homePage : 'textfix',
            menu:[{
                text:'消息管理',
                items:[
                  {id:'textfix',text:'消息管理',href:'__ROOT__/index.php/Messagefix/index',closeable : false},
                  {id:'textin',text:'消息添加',href:'__ROOT__/index.php/Message/index'},
                  {id:'textpush',text:'消息推送',href:'__ROOT__/index.php/Index/fixit'}
                ]
              }]
          }];
      new PageUtil.MainPage({
        modulesConfig : config
      });
    });
  </script>
</body>
</html>