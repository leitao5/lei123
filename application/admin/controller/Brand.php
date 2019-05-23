<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use catetree\Catetree;
use app\admin\model\Brand as BrandModel;

class Brand extends Controller
{
    private  $cate;
    private  $brand;
    public function _initialize() {
        $this->cate = new Catetree();
      //  $this->brand = new BrandModel();
    }

    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function lst()
    {
       $name = input('brand_name');
         if($name){
             $brand_name = [
                 'brand_name' => $name,
             ];
         }else{
             $brand_name = 1;
         }
        $brand = db('brand')->where($brand_name)->paginate(15);
        $this->assign('brand',$brand);
        return $this->fetch();
    }


    public function add()
    {
        if(request()->isPost()) {
            $data = input('post.');
            unset($data['file']);
            dump($data);
            if($data['brand_url'] && stripos($data['brand_url'],'http://') === false){
                $data['brand_url']='http://'.$data['brand_url'];
            }
            $add = db('brand')->insert($data);

            //dump($data);
            if($add){
                $this->success('添加成功');
            }else {
                $this->error('添加失败');
            }
        }
        return $this->fetch();
    }

    public function edit()
    {
        if(request()->isPost()) {
            $data = input('post.');
            unset($data['file']);
         //dump($data);
            if($data['brand_url'] && stripos($data['brand_url'],'http://') === false){
                $data['brand_url']='http://'.$data['brand_url'];
            }
            $edit = db('brand')->update($data);

            //dump($data);
            if($edit   !== false) {
                $this->success('更新成功');
            }else {
                $this->error('更新失败');
            }
        }

        $id = input('id');
        $brand=db('brand')->find($id);
        $this->assign([
            'brand'=>$brand,
        ]);
        return $this->fetch();
    }


    public function del($id)
    {
        //$id = input('id');
        $brand=db('brand');
        $Brands=$brand->field('brand_img')->find($id);
        $BrandImg=IMG_UPLOADS.$Brands['brand_img'];
        if(file_exists($BrandImg)){
            @unlink($BrandImg);
        }

        $del=$brand->delete($id);
        if($del ){
            return json(['msg'=>'删除品牌成功','status'=>'success']);
        }else{
            return json(['msg'=>'删除品牌失败','status'=>'fail']);
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
