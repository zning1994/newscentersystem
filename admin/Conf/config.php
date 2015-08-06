<?php

$arr1=array(
	//'配置项'=>'配置值'
	'URL_MODEL'	=>4,//path-info 模式
	//'SHOW_PAGE_TRACE' =>true,   
	//'SHOW_RUN_TIME' =>true,   //显示运行时间
	//'SHOW_ADV_TIME' =>true,   //显示详细的运行时间
	//'SHOW_DB_TIMES'=>true,//显示数据库操作次数
	//'SHOW_CACHE_TIMES'=>true,//显示缓存操作次数
	//'SHOW_USE_MEM'=>true,//显示内存开销
);

$arr2=include './config.inc.php';

return array_merge($arr1,$arr2);
?>