<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;


class Admin extends Controller
{

    private  $admin;
    public function _initialize() {
        $this->admin = model('admin');
    }
      public function lst(){
         $adminRes = $this->admin->paginate(6);
         $this->assign('adminRes',$adminRes);
         return view();
      }


      public function add(){
          if(request()->isPost()){
              $data = input('post.');
              unset($data['pass']);
              $adminLogin = $this->admin->insertAdmin($data);
              $add = $this->admin->save($adminLogin);
              if($add){
                  $this->success('管理员创建成功');
              }else{
                  $this->error('管理员创建失败');
              }
          }
          $auth_group = db('AuthGroup')->select();

          $this->assign('auth_group',$auth_group);
          return view();
      }

      public function edit($id){
          if(request()->isPost()){
              $data = input('post.');
              unset($data['pass']);

              $adminLogin = $this->admin->updatePass($data);
              $edit = $this->admin->save($adminLogin,$data['id']);
              if($edit){
                  $this->success('管理员修改成功');
              }else{
                  $this->error('管理员修改失败');
              }
          }
         $admins =  $this->admin->find($id);
         $this->assign('admins',$admins);
         return view();
      }

      public function del(){
        $id = input('id');
        $del = $this->admin->where('id',$id)->delete();
        if($del){
            return json(['msg'=>'删除管理员成功','status'=>'success']);
          }else{
            return json(['msg'=>'删除管理员失败','status'=>'error']);
        }
      }
}

