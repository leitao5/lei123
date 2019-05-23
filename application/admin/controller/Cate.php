<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use catetree\Catetree;

class Cate extends Controller
{

    private  $cate;
    public function _initialize() {
        $this->cate = new Catetree();
        //  $this->brand = new BrandModel();
    }

    public function lst()
    {
        $cateObj=db('cate');
        if(request()->isPost()){
            $data=input('post.');
            $this->cate->cateSort($data['sort'],$cateObj);
            $this->success('排序成功！',url('lst'));
        }
        $cateRes=$cateObj->order('sort DESC')->select();
        $cateRes= $this->cate->catetree($cateRes);
        $this->assign([
            'cateRes'=>$cateRes,
        ]);
        return view('lst');
    }

    public function add()
    {
        $cateObj=db('cate');
        if(request()->isPost()){
            $data=input('post.');
        //判断是否可以添加子分类
        if(in_array($data['pid'], ['1','3'])){
            $this->error('系统内置不能作为上级分类！');
        }
        if($data['pid']==2){
            $data['cate_type']=3;
        }
        $cateId=$cateObj->field('pid')->find($data['pid']);
        $cateId=$cateId['pid'];
        if($cateId==2){
            $this->error('此分类不能作为上级分类！');
        }

        $add=$cateObj->insert($data);
        if($add){
            $this->success('添加分类成功！');
        }else{
            $this->error('添加分类失败！');
        }
        return;
        }
        $cateRes=$cateObj->order('sort DESC')->select();
        $cateRes=$this->cate->catetree($cateRes);
        $this->assign([
            'cateRes'=>$cateRes,
        ]);
        return view();
    }

    public function edit($id){
        $cateObj=db('cate');
        if(request()->isPost()){
            $data=input('post.');
            $save=$cateObj->update($data);
            if($save !== false){
                $this->success('更新分类成功！');
            }else{
                $this->error('更新分类失败！');
            }
            return;
        }
        $cates=$cateObj->find($id);
        $cateRes=$cateObj->order('sort DESC')->select();
        $cateRes=$this->cate->catetree($cateRes);
        $this->assign([
            'cateRes'=>$cateRes,
            'cates'=>$cates
        ]);
        return view();
    }

    public function del($id)
    {
        $cate=db('cate');

        $sonids =  $this->cate->childrenids($id,$cate);
        $sonids[]=intval($id);
        $arrSys=[1,2,3];
        //array_intersect比较两个数组的键值，并返回交集 相同的 传过来的如果带1，2，3
        $arrRes=array_intersect($arrSys,$sonids);
        if($arrRes){
            $this->error('系统内置文章分类不允许删除！');
        }
        //删除分类前判断该分类下面有没有文章和图片  如果就都删除掉
        $article=db('article');
        foreach ($sonids as $k => $v) {
            $artRes=$article->field('id,thumb')->where(array('cate_id'=>$v))->select();
            foreach ($artRes as $k1 => $v1) {
                $thumbSrc=IMG_UPLOADS.$v1['thumb'];
                if(file_exists($thumbSrc)){
                    @unlink($thumbSrc);
                }
                $article->delete($v1['id']);
            }
        }
        $del=$cate->delete($sonids);
        if($del){
            return json(['msg'=>'删除文章分类成功','status'=>'success']);
        }else{
            return json(['msg'=>'删除文章分类失败','status'=>'error']);
        }
    }

}
