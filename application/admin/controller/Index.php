<?php
namespace app\admin\controller;
use think\Controller;
class Index extends Controller
{
    public function index()
    {
        return $this->fetch();
    }
    public function test()
    {
        \phpmailer\Email::send('1','1','1');
        return '发送成功!';
    	return "欢迎来到糯米o2o管理后台";
    }
    public function map(){
    	return \Map::staticimage('江苏盐城亭湖北闸');
    }
}
