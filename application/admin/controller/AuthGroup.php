<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;

class AuthGroup extends Controller
{
    public function lst(){
        $authgroup = db('auth_group')->paginate(10);
        $this->assign('authgroup',$authgroup);
        return view();
    }

    public function  add(){
      if(request()->isPost()){
            $data = input('post.');
            $add = db('auth_group')->insert($data);
            if($add){
                $this->success('角色添加成功');
            }else{
                $this->error('角色添加失败');
            }
      }

        $auth_rule = db('AuthCate')->alias('a')->field('a.*,b.*')->join('AuthRule b','a.id=b.cate_rule_id')->select();
       $this->assign('auth_rule',$auth_rule);
        return view();
    }

    public  function edit(){
        return view();
    }

    public function del(){

    }
}
