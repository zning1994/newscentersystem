<?php
/*
 * InexcelAction.class.php
 * 自定义导入Excel csv类
 *
 * 功能：1.完成通讯稿件统计导入（csv格式）
 * 		2.完成新闻中心成员信息导入（csv格式）
 * NewsCenterSystem
 *
 * Created by ZNing on 15/2/1.
 * Copyright (c) 2015年 ZNing. All rights reserved.
 *
 */
class InexcelAction extends Action {
	function index() {
		if (session ( '?username' )) {
			$this->assign ( 'username', session ( 'username' ) );
			
			//配置页面显示内容
			$this->assign ( 'title', '山东科大信息学院新闻中心管理系统' );
			$this->assign ( 'btn_ok_act', 'fix' );
			$this->assign ( 'btn_ok_text', '导入csv' );
			$this->display ();
		
		} 

		else {
			$this->error ( '您好，请先登录！', U ( '/Login/index/' ) );
		}
	}
	
	function fix() {
		//导入处理    
		$filename = $_FILES ['file'] ['tmp_name'];
		if (empty ( $filename )) {
			echo '请选择要导入的CSV文件！';
			exit ();
		}
		$handle = fopen ( $filename, 'r' );
		$result = input_csv ( $handle ); //解析csv 
		$len_result = count ( $result );
		if ($len_result == 0) {
			echo '没有任何数据！';
			exit ();
		}
		for($i = 1; $i < $len_result; $i ++) { //循环获取各字段值 
			$name = iconv ( 'gb2312', 'utf-8', $result [$i] [0] ); //中文转码 
			$sex = iconv ( 'gb2312', 'utf-8', $result [$i] [1] );
			$age = $result [$i] [2];
			$data_values .= "('$name','$sex','$age'),";
		}
		$data_values = substr ( $data_values, 0, - 1 ); //去掉最后一个逗号 
		fclose ( $handle ); //关闭指针 
		$query = mysql_query ( "insert into student (name,sex,age) values $data_values" ); //批量插入数据表中 
		if ($query) {
			echo '导入成功！';
		} else {
			echo '导入失败！';
		}
		
		$news = M ( 'article' )->field ( 'id,subject,zuozhe,opendate,wordss,kedabao,kdbqishu,author,lastmodifytime' )->select ();
		$result = mysql_query ( "select * from think_article" );
		$str = "稿件名,作者,日期,字数,科大报稿件标记,科大报期数,添加人,最后修改\n";
		$str = iconv ( 'utf-8', 'gb2312', $str );
		while ( $row = mysql_fetch_array ( $result ) ) {
			$subject = iconv ( 'utf-8', 'gb2312', $row ['subject'] );
			$zuozhe = iconv ( 'utf-8', 'gb2312', $row ['zuozhe'] );
			$str .= $subject . "," . $zuozhe . "," . $row ['opendate'] . "," . $row ['wordss'] . "," . $row ['kedabao'] . "," . $row ['kdbqishu'] . "," . $row ['author'] . "," . $row ['lastmodifytime'] . "\n"; //用引文逗号分开   
		}
		$filename = date ( 'YmdHis' ) . '-CISENEWS.csv'; //设置文件名   
		$this->export_csv ( $filename, $str ); //导出   
		exit ();
		$this->success ( 'CSV导出成功，返回上级页面', U ( 'Outerexcel/index' ) );
	}
	
	function import_csv($filename, $data) {
		header ( "Content-type:text/csv" );
		header ( "Content-Disposition:attachment;filename=" . $filename );
		header ( 'Cache-Control:must-revalidate,post-check=0,pre-check=0' );
		header ( 'Expires:0' );
		header ( 'Pragma:public' );
		echo $data;
	}
}

?>