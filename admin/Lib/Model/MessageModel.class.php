<?php
/*
 * ArticleModel.class.php
 * 自定义消息模型类
 *
 * 功能：1.完成消息标题自动验证功能
 * 		2.消息字段长度验证回调函数
 * 		3.消息自动完成，在create时自动执行
 * NewsCenterSystem
 *
 * Created by ZNing on 15/2/1.
 * Copyright (c) 2015年 ZNing. All rights reserved.
 *
 */
class MessageModel extends Model{
	
	//标题自动验证
	protected $_validate=array(
		array('subject',		'require',		'文章标题必须非空'),
		array('subject',		'callback_checklen',	'标题内容过长',	0,	'callback'),
	);
	
	//字段长度验证回调函数(ThinkPHP会自动帮我们传递参数)
	function callback_checklen($data){
		if(strlen($data)>200){
			return false;
		}
		return true;
	}
	
	//自动完成，在create时自动执行
	//array('填充字段','填充内容','填充条件','附加规则');
	//填充字段 
	protected $_auto=array(
			array('createtime','time',1,'function'),
	);
}

?>