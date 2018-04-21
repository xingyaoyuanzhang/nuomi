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
        if(!request()->isPost()){
            $this->error('必须post提交');
        }
        $data = input('post.');
        $validate = validate('Category');
        if (!$validate->scene('add')->check($data)){
            $this->error($validate->getError());
        }
        if(!empty($data['id'])){
            return $this->update($data);
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

    public function update($data){
        $res = $this->obj->save($data,['id'=>intval($data['id'])]);
        if($res){
            $this->success('更新成功');
        }else{
            $this->error('更新失败');
        }
    }

    public function listorder($id, $listorder){
        $res = $this->obj->save(['listorder'=>$listorder],['id'=>$id]);
        if($res){
            $this->result($_SERVER['HTTP_REFERER'],1,'success');
        }else{
            $this->result($_SERVER['HTTP_REFERER'],0,'更新失败');
        }
    }
    public function status(){
        $data = input('get.');
        $validate = validate('Category');
        if (!$validate->scene('status')->check($data)){
            $this->error($validate->getError());
        }
        $res = $this->obj->save(['status'=>$data['status']],['id'=>$data['id']]);
        if($res){
            $this->success('状态更新成功');
        }else{
            $this->error('状态更新失败');
        }
    }
    

  
}
