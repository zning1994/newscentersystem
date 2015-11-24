<?php
/*
 * MessagefixAction.class.php
 * 自定义消息管理展示类
 *
 * 功能：1.后台消息管理界面控制器
 * NewsCenterSystem
 *
 * Created by ZNing on 15/2/1.
 * Copyright (c) 2015年 ZNing. All rights reserved.
 *
 */
class MessagefixAction extends Action {	
	
	private  $message_item;
	
	/**
     * @函数Messagefix
     * @功能	显示通讯管理界面
     */
    public function index(){ 	
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
			
			//对原始信息过滤
			$this->filter($news_list);
			
			$this->assign('news_count',$count);
			$this->assign('title','山东科大信息学院新闻中心管理系统');
			$this->assign('news_list',$news_list);
			$this->assign('page_method',$show);
			$this->assign("waitSecond", "5");
						
			$this->display();}
		
		
		else
		{
			$this->error('您好，请先登录！！！',U('/Login/index/'));
		}	
    }
    

    /**
     * @函数	delete
     * @功能	删除文章
     */
    function delete(){
    	
    	//跳转至Article控制器来实现
    	if($_GET['mid']){
    		redirect(U('/Message/delete/mid/'.$_GET['mid']),0, '删除文章');
    	}
    	else{
    		$this->error('参数错误！');
    	}
    }
    
    /**
     * @函数	edit
     * @功能	编辑文章
     */
    function edit(){
    	if($_GET['mid']){
    		redirect(U('/Message/index/mid/'.$_GET['mid']),0, '编辑文章');
    	}
    	else{
    		$this->error('参数错误！');
    	}
    } 
    
/*--------------------------------------------------内部方法-------------------------------------------------------------------*/    
     /**
     * @函数	filter
     * @功能	对数据库中的信息进行裁剪和过滤
     */ 
    private function filter($list){
    		
    	foreach($list as $key=>$value){			
   			//设置显示的创建时间
			$list[$key]['time']=date("Y-m-d H:i:s",$value['time']);
				
			//设置显示的最后修改时间
			if(!$value['time']){
				$list[$key]['time']="无";
			}else{
				$list[$key]['time']=date("Y-m-d H:i:s",$value['time']);
			}		
			
			//文章标题过长时裁剪
			if(strlen($list[$key]['subject'])>800){
					$list[$key]['subject']=$this->cutString($list[$key]['subject'],0,20).'...';				
			}
		}
    }
    
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

