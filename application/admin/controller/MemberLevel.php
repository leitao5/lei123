<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;

class MemberLevel extends Controller
{
    public function lst()
    {
        $mlRes=db('memberLevel')->order('id DESC')->paginate(6);
        $this->assign([
            'mlRes'=>$mlRes,
        ]);
        return view('lst');
    }


    public function add()
    {
        if(request()->isPost()){
            $data=input('post.');
            //验证
            //  		$validate = validate('type');
            //  		if(!$validate->check($data)){
            //     $this->error($validate->getError());
            // }
            $add=db('memberLevel')->insert($data);
            if($add){
                $this->success('添加会员级别成功！');
            }else{
                $this->error('添加会员级别失败！');
            }
            return;
        }
        return view();
    }

    public function edit()
    {
        if(request()->isPost()){
            $data=input('post.');
            //验证
            //  		$validate = validate('type');
            //  		if(!$validate->check($data)){
            //     $this->error($validate->getError());
            // }
            $save=db('memberLevel')->update($data);
            if($save !== false){
                $this->success('修改会员级别成功！');
            }else{
                $this->error('修改会员级别失败！');
            }
            return;
        }
        $id=input('id');
        $mls=db('memberLevel')->find($id);
        $this->assign([
            'mls'=>$mls,
        ]);
        return view();
    }

    public function del(){
        $id = input('id');
        $del=db('memberLevel')->delete($id);
        if($del){
            return json(['msg'=>'删除会员级别成功','status'=>'success']);
        }else{
            return json(['msg'=>'删除会员级别失败','status'=>'error']);
        }
    }


}
