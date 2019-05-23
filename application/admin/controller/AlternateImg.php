<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;

class AlternateImg extends Controller
{
    public function lst()
    {
        $alternateImg=db('alternateImg');
        if(request()->isPost()){
            $data=input('post.');
            foreach ($data['sort'] as $k => $v) {
                $alternateImg->where('id','=',$k)->update(['sort'=>$v]);
            }
            $this->success('排序成功！');
        }
        $alternateImgRes=$alternateImg->order('sort DESC')->paginate(6);
        $this->assign([
            'alternateImgRes'=>$alternateImgRes,
        ]);
        return view('lst');
    }

    public function add()
    {
        if(request()->isPost()){
            $data=input('post.');
            $data['time']= time();
            unset($data['file']);
            if($data['link_url'] && stripos($data['link_url'],'http://') === false){
                $data['link_url']='http://'.$data['link_url'];
            }
            $add=db('alternateImg')->insert($data);
            if($add){
                $this->success('添加轮播图成功！');
            }else{
                $this->error('添加轮播图失败！');
            }
            return;
        }
        return view();
    }

    public function edit($id){
        if(request()->isPost()){
            $data=input('post.');
            unset($data['file']);
            if($data['link_url'] && stripos($data['link_url'],'http://') === false){
                $data['link_url']='http://'.$data['link_url'];
            }
            $add=db('alternateImg')->update($data);
            if($add){
                $this->success('更新轮播图成功！');
            }else{
                $this->error('更新轮播图失败！');
            }
            return;
        }

        $alternateImgs=db('alternateImg')->find($id);
        $this->assign([
            'alternateImgs'=>$alternateImgs,
        ]);
        return view();

    }

    public function del(){
        $id = input('id');
        $alterImg=db('alternateImg');
        $alterImgs=$alterImg->field('img_src')->find($id);
        $imgSrc=IMG_UPLOADS.$alterImgs['img_src'];
        if(file_exists($imgSrc)){
            @unlink($imgSrc);
        }
        $del=$alterImg->delete($id);
        if($del){
            return json(['msg'=>'删除轮播图成功','status'=>'success']);
        }else{
            return json(['msg'=>'删除轮播图失败','status'=>'error']);
        }


    }
}
