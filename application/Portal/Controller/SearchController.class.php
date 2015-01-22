<?php

/**
 * 搜索结果页面
 */
namespace Portal\Controller;
use Common\Controller\HomeBaseController;
class SearchController extends HomeBaseController {
    //文章内页
    public function index() {
    	$_GET = array_merge($_GET, $_POST);
		$m = $_REQUEST['model'];
		if (empty($m)){
			$this -> error("查询失败,您查询的方式不正确");
		}
		if ($m=='users'){
			$m='posts';
		}
		$dd = M($m);
		$arr =$_REQUEST;
		foreach ($arr as $key=>$value)
			{
			    if ($key==='model')
			     unset($arr[$key]);
				 if (is_numeric($value)){
				 	$arr[$key]=(int)$value;
				 }
			}
		$xx=$dd->where($arr)->select();
		$this->dd=$xx;
		$this->display(":search");
    }
}
