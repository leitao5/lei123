<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;

class AuthCate extends Controller
{
    public function lst(){
        $authcate = db('AuthCate')->paginate(10);
        $this->assign('authcate',$authcate);
        return view();
    }

    public function add(){
        if(request()->isPost()){
          $data = input('post.');
        //  dump($data);die;
          $add = db('AuthCate')->insert($data);
          if($add){
              $this->success('添加权限分类成功');
          }else{
              $this->error('添加权限分类失败');
          }
        }
    }
}
