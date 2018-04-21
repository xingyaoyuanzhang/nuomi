<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;

class Category extends Controller
{

    private $obj;
    public function _initialize(){
        $this->obj = model('category');
    }
    /**
     * 显示分类
     *
     * @return \think\Response
     */
    public function index()
    {
       $parentId = input('get.parent_id','0','intval');
       $categorys = $this->obj->getFirstCategorys($parentId);
       // var_dump($categorys);die();
        return $this->fetch('',['categorys'=>$categorys]);
    }
    
    /**
     * 显示添加
     *
     * @return \think\Response
     */
    public function add()
    {
        $categorys = $this->obj->getFirstCategory();
        return $this->fetch('',['categorys'=>$categorys]);
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
        $res = $this->obj->add($data);
        if($res){
            $this->success('分类添加成功');
        }else{
            $this->error('分类插入失败');
        }
    }

    public function edit($id=0){
         if(intval($id) < 1){
            $this->error('参数不合法');
         }
         $category = $this->obj->get($id);
         $categorys = $this->obj->getFirstCategory();
         return $this->fetch('',['categorys'=>$categorys,'category'=> $category]);

    }
    

  
}
