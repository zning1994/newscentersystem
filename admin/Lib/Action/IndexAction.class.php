<?php
/*
 * IndexAction.class.php
 * 后台首页控制器类
 *
 * 功能：1.完成后台首页展示与用户登录账户机制的实现
 * NewsCenterSystem
 *
 * Created by ZNing on 15/2/1.
 * Copyright (c) 2015年 ZNing. All rights reserved.
 *
 */
class IndexAction extends Action {	
	/**
     * @函数	index
     * @功能	显示后台管理主页面（包含登录判断）
     */
    public function index(){ 	
        header("Content-Type:text/html; charset=utf-8");
   
          
		if(session('?username')){
			$this->assign('username',session('username'));
			$this->assign('news_count',$count);
			$this->assign('title','山东科大信息学院新闻中心管理系统');
			$this->assign('news_list',$news_list);
			$this->assign('page_method',$show);
			$this->assign("waitSecond", "5");
						
			$this->display();
			
		}
		
		else
		{
			$this->error('您好，请先登录！！！',U('/Login/index/'));
		}	
    }
    
    public function welcome(){
    	        header("Content-Type:text/html; charset=utf-8");
   
          
		if(session('?username')){
			$this->assign('username',session('username'));

		
			//实例化文章模型
			$news=M('message');	
			$count=$news->count();
		
			//分页显示文章列表，每页8篇文章
			import('ORG.Util.Page');
			$page=new Page($count);//后台管理页面默认一页显示8条文章记录
	
            $page->setConfig('prev', "&laquo; Previous");//上一页
            $page->setConfig('next', 'Next &raquo;');//下一页
            $page->setConfig('first', '&laquo; First');//第一页
            $page->setConfig('last', 'Last &raquo;');//最后一页	
			$page->setConfig('theme',' %first% %upPage%  %linkPage%  %downPage% %end%');
            //设置分页回调方法
			$show=$page->show();
	
			$news_list=$news->field(array('mid','level','subject','author','time'))->order('mid desc')->limit($page->firstRow.','.$page->listRows)->select();
			
			$this->assign('news_count',$count);
			$this->assign('title','山东科大信息学院新闻中心管理系统');
			$this->assign('news_list',$news_list);
			$this->assign('page_method',$show);
			$this->assign("waitSecond", "5");
						
			$this->display();
			
		}
		
		else
		{
			$this->error('您好，请先登录！！！',U('/Login/index/'));
		}	
    }
    
    /**
     * @函数	quit
     * @功能	登出账户，跳转至登录页面。并清除Session
     */
    function quit(){
    	session(null);//清空所有session信息
		redirect(U('/Login/index'),0, '重新登录');
    }
    
/*--------------------------------------------------内部方法-------------------------------------------------------------------*/    
    
     /**
     * @函数	cutString
     * @功能	字符串裁剪(仅适用于UTF-8)
     */	
	private function cutString($str, $from, $len)
	{
   		return preg_replace('#^(?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,'.$from.'}'.
                       '((?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,'.$len.'}).*#s',
                       '$1',$str);
	}
}

