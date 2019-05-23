<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;

class AuthRule extends Controller
{
    public function lst(){
     //   ['category c','g.category_id=c.id'],
        $authrule = db('AuthRule')->alias('a')->field('a.*,b.auth_cate')->join('AuthCate b','a.cate_rule_id=b.id')->paginate(10);
        $this->assign('authrule',$authrule);
        return view();
    }

    public function add(){
        if(request()->isPost()){
            $data = input('post.');
            $add = db('AuthRule')->insert($data);
            if($add){
                $this->success('权限规则添加成功');
            }else{
                $this->error('权限规则添加失败');
            }
        }
        $authcate = db('AuthCate')->select();
       // dump($authcate); MemberLevel
        $this->assign([
            'authcate'=>$authcate,
        ]);
        return view();
    }
}
