<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;

class Category extends Controller
{
    /**
     * 显示分类
     *
     * @return \think\Response
     */
    public function index()
    {
        return $this->fetch();
    }
    
    /**
     * 显示添加
     *
     * @return \think\Response
     */
    public function add()
    {
        return $this->fetch();
    }
    
    /**
     * 添加
     *
     * @return \think\Response
     */
    public function save()
    {
        $data = input('post.');
        $validate = validate('Category');
        if (!$validate->scene('add')->check($data)){
            $this->error($validate->getError());
        }
    }
    

  
}
