<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use catetree\Catetree;
use think\Config;
class Goods extends Controller
{

    private  $cate;
    private  $goods;
    public function _initialize() {
        $this->cate = new Catetree();
        $this->goods = model('goods');

    }
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function lst()
    {
        $join = [
            ['category c','g.category_id=c.id'],
            ['brand b','g.brand_id=b.id','LEFT'],
            ['type t','g.type_id=t.id','LEFT'],
            ['product p','g.id=p.goods_id','LEFT'],
        ];
        $goodsRes=db('goods')->alias('g')->field('g.*,c.cate_name,b.brand_name,t.type_name,SUM(p.goods_number) gn')->join($join)->group('g.id')->order('g.id DESC')->paginate(6);
        $this->assign([
            'goodsRes'=>$goodsRes,
        ]);
        return view('lst');
    }


    public function add()
    {

        if(request()->isPost()){
           $data = input('post.');
           dump($data);
            $this->goods->save($data);
        }
        // 会员级别数据
        $mlRes=db('memberLevel')->field('id,level_name')->select();
        // 获取商品类型
        $typeRes=db('type')->select();
        // 品牌分类
        $brandRes=db('brand')->field('id,brand_name')->select();
        // 商品分类
        $Category=new Catetree();
        $CategoryObj=db('Category');
        $CategoryRes=  $CategoryObj->order('sort DESC')->select();
        $CategoryRes=  $this->cate->Catetree($CategoryRes);

        $this->assign([
            'mlRes'=>$mlRes,
            'typeRes'=>$typeRes,
            'brandRes'=>$brandRes,
            'CategoryRes'=>$CategoryRes,
        ]);
        return view();
    }

    //上传图片
    public function upload(){
        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file('file');
        // 移动到框架应用根目录/public/uploads/ 目录下
        if($file){
            $info = $file->move(ROOT_PATH . 'public' . DS . 'static'. DS .'uploads'.DS .'shangpin');
            if($info){
               // return $info->getSaveName();
                echo $info->getFilename();
            }else{
                // 上传失败获取错误信息
                echo $file->getError();
                die;
            }
        }
    }

}
