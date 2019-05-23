<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use catetree\Catetree;
use app\admin\model\Category as CategoryModel;
class Category extends Controller
{
    private  $cate;
    private  $category;
    public static $uploads;
    public function _initialize() {
        $this->cate = new Catetree();
        $this->category =  new CategoryModel();
        //  $this->brand = new BrandModel();
    }
    public function lst($parentId = 0){
      $pid = input('pid');
        $data = [
            'pid' => $parentId,
        ];
        $pids = [
            'pid' => $pid,
        ];
        $order = [
            'sort' => 'desc',
        ];
        $category = $this->category->select();
        $CategoryRes=  $this->cate ->catetree($category);
        $this->assign('CategoryRes',$CategoryRes);
        return $this->fetch();
   }

    public function add(){
        if(request()->isPost()) {
            $data = input('post.');
            $add = $this->category->save($data);
            if($add){
                $this->success('添加成功');
            }else {
                $this->error('添加失败');
            }
        }
        $cateRes = $this->category->order('sort DESC')->select();
        $CategoryRes = $this->cate->catetree($cateRes);
        $this->assign([
            'CategoryRes'=>$CategoryRes,
        ]);
        return $this->fetch();
    }

    public function edit()
    {
        if(request()->isPost()){
            $data=input('post.');
            //处理图片上传 修改就删除以前的图片
                $categorys= $this->category->field('cate_img')->find($data['id']);
                if($categorys['cate_img']){
                    $imgSrc=IMG_UPLOADS.$categorys['cate_img'];
                    if(file_exists($imgSrc)){
                        @unlink($imgSrc);
                    }
                }
            //验证
            //  		$validate = validate('Category');
            //  		if(!$validate->check($data)){
            //     $this->error($validate->getError());
            // }
            $save=  $this->category ->update($data);
            if($save !== false){
                $this->success('修改分类成功！');
            }else{
                $this->error('修改分类失败！');
            }
            return;
        }
        $id = input('id');
        $Categorys=$this->category->find($id);
        $cateRes = $this->category->order('sort DESC')->select();
        $CategoryRes = $this->cate->catetree($cateRes);
        $this->assign([
            'CategoryRes'=>$CategoryRes,
            'Categorys'=>$Categorys,
        ]);
        return view();
    }
     //上传图片
    public function upload(){
        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file('file');
        // 移动到框架应用根目录/public/uploads/ 目录下
        if($file){
            $info = $file->move(ROOT_PATH . 'public' . DS . 'static'. DS .'uploads');
            if($info){
                //  echo '{"imgUrl":"'.$info->getSaveName().'"}';
                return $info->getSaveName();
                ///  return '{"imgUrl":"'.$info->getSaveName().'"}';
            }else{
                // 上传失败获取错误信息
                echo $file->getError();
                die;
            }
        }
    }


}
