<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use catetree\Catetree;

class Article extends Controller
{

    private  $cate;
    public function _initialize() {
        $this->cate = new Catetree();
    }
    public function lst()
    {
        $artRes=db('article')->field('a.*,c.cate_name')->alias('a')->join('cate c',"a.cate_id=c.id")->order('a.id DESC')->paginate(10);
        $this->assign([
            'artRes'=>$artRes,
        ]);
        return view('lst');
    }

    public function add()
    {
        if(request()->isPost()){
            $data=input('post.');
            unset($data['file']);
            $data['addtime']=time();
            if($data['link_url'] && stripos($data['link_url'],'http://') === false){
                $data['link_url']='http://'.$data['link_url'];
            }

            $add=db('article')->insert($data);
            if($add){
                $this->success('添加文章成功！');
            }else{
                $this->error('添加文章失败！');
            }
            return;
        }
        $cateRes = db('cate')->order('sort DESC')->select();
        $cateRes = $this->cate->catetree($cateRes);
        $this->assign([
            'cateRes'=>$cateRes,
        ]);
        return view();
    }



    public function edit($id)
    {
        if(request()->isPost()){
            $data=input('post.');
            unset($data['file']);
            if($data['link_url'] && stripos($data['link_url'],'http://') === false){
                $data['link_url']='http://'.$data['link_url'];
            }
            $oldarticles=db('article')->field('thumb')->find($data['id']);
            $oldarticleImg=IMG_UPLOADS.$oldarticles['thumb'];
            if(file_exists($oldarticleImg)){
                @unlink($oldarticleImg);
            }
            $save=db('article')->update($data);
            if($save !== false){
                $this->success('更新文章成功！');
            }else{
                $this->error('更新文章失败！');
            }
            return;
        }
        $arts=db('article')->find($id);
        $cateRes=db('cate')->order('sort DESC')->select();
        $cateRes=$this->cate->catetree($cateRes);
        $this->assign([
            'arts'=>$arts,
            'cateRes'=>$cateRes,
        ]);
        return view();
    }

    public function del($id)
    {
        $article=db('article');
        $arts=$article->field('thumb')->find($id);
        $thumbSrc=IMG_UPLOADS.$arts['thumb'];
        if(file_exists($thumbSrc)){
            @unlink($thumbSrc);
        }
        $del=$article->delete($id);
        if($del){
            return json(['msg'=>'删除文章成功','status'=>'success']);
        }else{
            return json(['msg'=>'删除文章失败','status'=>'error']);
        }
    }

    //上传图片
    public function upload(){
        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file('file');
        // 移动到框架应用根目录/public/uploads/ 目录下
        if($file){
            $info = $file->move(ROOT_PATH . 'public' . DS . 'static'. DS .'uploads');
            if($info){
                return $info->getSaveName();
            }else{
                // 上传失败获取错误信息
                echo $file->getError();
                die;
            }
        }
    }

}
