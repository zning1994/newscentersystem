<?php
/*
 * OutexcelAction.class.php
 * 自定义导出Excel csv类
 *
 * 功能：1.完成通讯稿件统计导出（csv格式）
 * 		2.完成新闻中心成员信息导出（csv格式）
 * NewsCenterSystem
 *
 * Created by ZNing on 15/2/1.
 * Copyright (c) 2015年 ZNing. All rights reserved.
 *
 */
class OutexcelAction extends Action {
	function index() {
		if (session ( '?username' )) {
			$this->assign ( 'username', session ( 'username' ) );
			
			//配置页面显示内容
			$this->assign ( 'title', '山东科大信息学院新闻中心管理系统' );
			$this->assign ( 'btn_ok_act', 'fix' );
			$this->assign ( 'btn_ok_text', '立即导出' );
			$this->display ();
		
		} 

		else {
			$this->error ( '您好，请先登录！', U ( '/Login/index/' ) );
		}
	}

	function GetGB2312String($name)
    {//此方法定义未使用，暂放备用
		$tostr = "";
		for($i=0;$i<strlen($name);$i++)
		{
			$curbin = ord(substr($name,$i,1));
			if($curbin < 0x80)
			{
				$tostr .= substr($name,$i,1);
			}elseif($curbin < bindec("11000000")){
				$str = substr($name,$i,1);
				$tostr .= "&#".ord($str).";";
			}elseif($curbin < bindec("11100000")){
				$str = substr($name,$i,2);
				$tostr .= "&#".$this->GetUnicodeChar($str).";";
				$i += 1;
			}elseif($curbin < bindec("11110000")){
				$str = substr($name,$i,3);
				$gstr= iconv("UTF-8","GB2312",$str);
				if(!$gstr)
				{
					$tostr .= "&#".$this->GetUnicodeChar($str).";";
				}else{
					$tostr .= $gstr;
				}
				$i += 2;
			}elseif($curbin < bindec("11111000")){
				$str = substr($name,$i,4);
				$tostr .= "&#".$this->GetUnicodeChar($str).";";

				$i += 3;
			}elseif($curbin < bindec("11111100")){
				$str = substr($name,$i,5);
				$tostr .= "&#".$this->GetUnicodeChar($str).";";

				$i += 4;
			}else{
				$str = substr($name,$i,6);
				$tostr .= "&#".$this->GetUnicodeChar($str).";";

				$i += 5;
			}
		}
		return $tostr;
	}//This is the end of fuction "GetGB2312String"

	function GetUnicodeChar($str)
	{//此方法定义未使用，暂放备用
		$temp = "";
		for($i=0;$i<strlen($str);$i++)
		{
			$x = decbin(ord(substr($str,$i,1)));
			if($i == 0)
			{
				$s = strlen($str)+1;
				$temp .= substr($x,$s,8-$s);
			}else{
				$temp .= substr($x,2,6);
			}
		}
		return bindec($temp);
	}//This is the end of fuction "GetUnicodeChar"
	
	function fix() {
		//导出处理    
		$news = M ( 'article' )->field ( 'id,subject,zuozhe,opendate,wordss,kedabao,kdbqishu,author,lastmodifytime' )->select ();
		$result = mysql_query ( "select * from think_article" );
		$str = "稿件名,作者,日期,字数,科大报稿件标记,科大报期数,添加人,最后修改\n";
		$str = iconv ( 'utf-8', 'gbk//IGNORE', $str );
		while ( $row = mysql_fetch_array ( $result ) ) {
            //$resubject=$this->GetGB2312String($row ['subject']);
			$subject = iconv ( 'utf-8', 'gbk//IGNORE', $row ['subject'] );
			$zuozhe = iconv ( 'utf-8', 'gbk//IGNORE', $row ['zuozhe'] );
			$str .= $subject . "," . $zuozhe . "," . $row ['opendate'] . "," . $row ['wordss'] . "," . $row ['kedabao'] . "," . $row ['kdbqishu'] . "," . $row ['author'] . "," . $row ['lastmodifytime'] . "\n"; //用引文逗号分开
		}
		$filename = date ( 'YmdHis' ) . '-CISENEWS.csv'; //设置文件名
		$this->export_csv ( $filename, $str ); //导出
        $this->success ( 'CSV导出成功，返回上级页面', U ( 'Outerexcel/index' ) );
        exit ();
	}
	
	function export_csv($filename, $data) {
		header ( "Content-type:text/csv" );
		header ( "Content-Disposition:attachment;filename=" . $filename );
		header ( 'Cache-Control:must-revalidate,post-check=0,pre-check=0' );
		header ( 'Expires:0' );
		header ( 'Pragma:public' );
		echo $data;
	}
}

?>