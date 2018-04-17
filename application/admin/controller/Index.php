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
    	return "欢迎来到糯米o2o管理后台";
    }
}
