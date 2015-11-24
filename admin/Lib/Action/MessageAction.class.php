<?php
/*
 * MessageAction.class.php
 * 自定义消息页面类
 *
 * 功能：1.完成消息内容录入及编辑
 * NewsCenterSystem
 *
 * Created by ZNing on 15/2/1.
 * Copyright (c) 2015年 ZNing. All rights reserved.
 *
 */
class MessageAction extends Action{
	
	private  $message_item;
	/**
     * @函数	index
     * @功能	显示添加文章主页面
     */
	function index(){
		
	if(session('?username')){
		$this->assign('username',session('username'));
		header("Content-Type:text/html; charset=utf-8");
		$this->assign('title','山东科大信息学院新闻中心管理系统');
		if($id=(int)$_GET['mid']){
			$message=M('message');
			$message_item=$message->where("mid=$id")->find();		
			$this->assign('message_item',$message_item);	
			$this->assign('btn_ok_text','完成修改');
			$this->assign('btn_ok_act','update');
		}else{
			$this->assign('btn_ok_act','add');
			$this->assign('btn_ok_text','添加消息');
		}
		$this->display();
					
		}
		
		else
		{
			$this->error('您好，请先登录！',U('/Login/index/'));
		}	
	}
	
	function show() {
		if (session ( '?username' )) {
			$this->assign ( 'username', session ( 'username' ) );
			header ( "Content-Type:text/html; charset=utf-8" );
			$this->assign ( 'title', '山东科大信息学院新闻中心管理系统' );
			if ($id = ( int ) $_GET ['mid']) {
				$message = M ( 'message' );
				$message_item = $message->where ( "mid=$id" )->find ();
				$this->assign ( 'message_item', $message_item );
			} else {
				$this->error('参数错误！');
			}
			$this->display ();
		} 
		else {
			$this->error ( '您好，请先登录！', U ( '/Login/index/' ) );
		}
	}
	
	/**
     * @函数	add
     * @功能	文章添加完成，写入数据库
     */
	function add(){
		header("Content-Type:text/html; charset=utf-8");
	
		$message=D('Message');		
		if($message->create()){
			
			$message->msag		=$_POST['editorValue'];
			$message->author		=session('username');
			$message->level		=$_POST['level'];
			$message->time	=date("Y-m-d H:i:s", time());
					
			//将文章写入数据库
			if($message->add()){
				$this->success('消息添加成功，返回上级页面',U('Message/index'));
			}else{
				$this->error('消息添加失败，返回上级页面');
			}
			
		}else{
			$this->error($message->getError());
		}	
	}
	
	/**
     * @函数	delete
     * @功能	删除文章
     */
	function delete(){		
    	$message=M('message');
		if($message->delete($_GET['mid'])){
			$this->success('消息删除成功');
		}else{
			$this->error($message->getLastSql());
		}
	}
	
	/**
     * @函数	edit
     * @功能	删除文章
     */
	function edit(){
		header("Content-Type:text/html; charset=utf-8");
		if($_GET['mid']){
			redirect(U('/Message/index/mid/'.$_GET['mid']),0, '编辑文章');
		}
	}
	
	/**
     * @函数	update
     * @功能	更新修改后的文章到数据库
     */
	function update(){
		
		header("Content-Type:text/html; charset=utf-8");	
		$message=M('Message');		
	
		$data = array('subject'=>$_POST['subject'],'level'=>$_POST['level'],'msag'=>$_POST['editorValue'],'time'=>date("Y-m-d H:i:s", time()));		
		$id=$_POST['mid'];

		$message->where('mid='.$id)->setField($data); // 根据条件保存修改的数据
		$this->success('消息更新成功，返回上级页面',U('Messagefix/index'));
	}
}

?>