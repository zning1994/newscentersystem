<?php

/*
 * 自定义User模型类
 * 功能：1.完成自动验证功能
 */
class UserModel extends Model{	
	
	//自动验证成员属性(二维数组，每个数组代表一个验证规则）
	//array('验证字段','验证规则','错误提示','验证条件','附加规则','验证时间'),
	//验证字段：表单中的字段名称，也可以是表单中的一些辅助字段，例如验证码，重复密码等
	//验证规则：
	//错误提示：出现错误，抛出一个什么样的提示告知用户
	//验证条件：参考手册6.15 （共有0,1,2三种值）
	//附加规则：比如使用正则表达式验证，callback函数验证等，默认使用正则验证
	//验证时间：1.新增时验证 2.编辑时验证 3.全部清况下验证
	protected $_validate=array(
		array('username',		'require',		'用户名必须非空'		),
		array('username',		'callback_checklen',	'用户名过长或过短',	0,	'callback'),
		array('password',		'require',		'密码必须非空'			),
		array('repassword',	'require',		'请重复输入密码'		),
		array('password',		'repassword','两次输入的密码不一致，请重新输入',		0,	'confirm'),
		
	);
	
	//字段长度验证回调函数(ThinkPHP会自动帮我们传递参数)
	function callback_checklen($data){
		if(strlen($data)>15 || strlen($data)<6){
			return false;
		}
		return true;
	}
	
	//自动完成，在create时自动执行
	//array('填充字段','填充内容','填充条件','附加规则');
	//填充字段 
	protected $_auto=array(
			array('password','md5',3,'function'),
			array('ip','callback_returnip',1,'callback'),
			array('createtime','time',1,'function'),
	);
	
	function callback_returnip(){
			return $_SERVER['REMOTE_ADDR'];	
	}
	
		
}

?>