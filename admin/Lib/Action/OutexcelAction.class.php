<?php

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
			$this->error ( '您好，请先登录！！！', U ( '/Login/index/' ) );
		}
	}
	
	function fix() {
		//导出处理    
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