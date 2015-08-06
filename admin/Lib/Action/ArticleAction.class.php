<?php

class ArticleAction extends Action{
	
	private  $article_item;
	/**
     * @函数	index
     * @功能	显示添加文章主页面
     */
	function index(){
		
	if(session('?username')){
		$this->assign('username',session('username'));
		header("Content-Type:text/html; charset=utf-8");
		$this->assign('title','山东科大信息学院新闻中心管理系统');
		if($id=(int)$_GET['id']){
			$article=M('article');
			$article_item=$article->where("id=$id")->find();		
			$this->assign('article_item',$article_item);	
			$this->assign('btn_ok_text','完成修改');
			$this->assign('btn_ok_act','update');
		}else{
			$this->assign('btn_ok_act','add');
			$this->assign('btn_ok_text','添加通讯');
		}
		$this->display();
					
		}
		
		else
		{
			$this->error('您好，请先登录！！！',U('/Login/index/'));
		}	
	}
	
	/**
     * @函数	add
     * @功能	文章添加完成，写入数据库
     */
	function add(){
		header("Content-Type:text/html; charset=utf-8");
	
		$article=D('Article');		
		if($article->create()){
			
			$article->message		=$_POST['editorValue'];
			$article->author		=session('username');
			$article->createtime	=date("Y-m-d H:i:s", time());
			$article->lastmodifytime=date("Y-m-d H:i:s", time());
			$article->zuozhe		=$_POST['zuozhe'];
			$article->opendate		=$_POST['opendate'];
			$article->kedabao		=$_POST['kedabao'];
			$article->kdbqishu		=$_POST['kdbqishu'];
			$article->wordss		=$_POST['wordss'];
					
			//将文章写入数据库
			if($article->add()){
				$this->success('文章添加成功，返回上级页面',U('Article/index'));
			}else{
				$this->error('文章添加失败，返回上级页面');
			}
			
		}else{
			$this->error($article->getError());
		}	
	}
	
	/**
     * @函数	delete
     * @功能	删除文章
     */
	function delete(){		
    	$article=M('article');
		if($article->delete($_GET['id'])){
			$this->success('文章删除成功');
		}else{
			$this->error($article->getLastSql());
		}
	}
	
	/**
     * @函数	edit
     * @功能	删除文章
     */
	function edit(){
		header("Content-Type:text/html; charset=utf-8");
		if($_GET['id']){
			redirect(U('/Article/index/id/'.$_GET['id']),0, '编辑文章');
		}
	}
	
	/**
     * @函数	update
     * @功能	更新修改后的文章到数据库
     */
	function update(){
		
		header("Content-Type:text/html; charset=utf-8");	
		$article=M('Article');		
	
		$data = array('subject'=>$_POST['subject'],'message'=>$_POST['editorValue'],'lastmodifytime'=>date("Y-m-d H:i:s", time()),'zuozhe'=>$_POST['zuozhe'],'opendate'=>$_POST['opendate'],'kedabao'=>$_POST['kedabao'],'kdbqishu'=>$_POST['kdbqishu'],'wordss'=>$_POST['wordss']);		
		$id=$_POST['id'];

		$article->where('id='.$id)->setField($data); // 根据条件保存修改的数据
		$this->success('文章更新成功，返回上级页面',U('Articlefix/index'));
	}
}

?>