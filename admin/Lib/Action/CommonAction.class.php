<?php
/*
 * CommonAction.class.php
 * 自定义公共使用类
 *
 * 功能：1.完成验证码方法的实现
 * NewsCenterSystem
 *
 * Created by ZNing on 15/2/1.
 * Copyright (c) 2015年 ZNing. All rights reserved.
 *
 */
class CommonAction extends  Action{
	
	
	function verify(){
		//导入验证码类
		import("ORG.Util.Image");

		//生成验证码
		
		/*
		 * 参数1：验证码长度，默认4
		 * 参数2：类型，0为字母，1为数字，2为大写字母，3为小写字母，4为中文
		 * 参数3：图片类型，默认png格式，若服务器没有开PNG，就改成其他格式
		 * 参数4：图片宽度（根据长度自动计算）
		 * 参数5：图片高度，默认22个像素
		 * 参数6：验证码保存在Session的名称 'verify'
		 */
		 
		Image::buildImageVerify(4,1,'png',70,30);//静态方法
		
		//Image::GBVerify();
		
	}
}

?>