<?php

class UserAction extends Action {
	
	private  $user_item;
	
	function index() {
		if (session ( '?username' )) {
			$this->assign ( 'username', session ( 'username' ) );
			
			//配置页面显示内容
			$this->assign ( 'title', '山东科大信息学院新闻中心管理系统' );
			if($id=(int)$_GET['id']){
			$user=M('user');
			$user_item=$user->where("id=$id")->find();		
			$this->assign('user_item',$user_item);	
			$this->assign('btn_ok_text','完成修改');
			$this->assign('btn_ok_act','update');
		}else{
			$this->assign('btn_ok_act','add');
			$this->assign('btn_ok_text','添加用户');
		}
			$this->display ();
		} else {
			$this->error ( '您好，请先登录！！！', U ( '/Login/index/' ) );
		}
	}
	
	function add() {
		//dump($_POST);
		

		//首先检查验证码是否正确(验证码存在Session中)
		if ($_SESSION ['verify'] != md5 ( $_POST ['verify'] )) {
			$this->error ( '验证码不正确' );
		}
		
		$user = D ( 'User' ); //参数的User必须首字母大写，否则自动验证功能失效！
		

		if ($user->create ()) {
			
			$user->username=$_POST['username'];
			$user->password=md5($_POST['password']);
			$user->createtime=date("Y-m-d H:i:s", time());
			$user->ip=get_client_ip();
			
			if ($user->add ()) {
				$this->success ( '注册新用户成功!' );
			} else {
				$this->error ( '注册新用户失败!' );
			}
		} else {
			
			$this->error ( $user->getError () );
		}
	
	}
}

?>