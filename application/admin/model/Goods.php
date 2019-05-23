<?php

namespace app\admin\model;

use think\Model;
use think\Config;

class Goods extends Model
{
     protected $field=true;
    protected static function init()
    {
        //添加商品之前
        Goods::beforeInsert(function ($goods) {
            // 生成商品主图的三张缩略图

             $thumbName=$goods['og_thumb'];
          //  dump($goods);

            $bigwidth = config::get('image.big_thumb_width');
            $bigheight = config::get('image.big_thumb_height');
            $midwidth = config::get('image.mid_thumb_width');
            $midheight = config::get('image.mid_thumb_height');
            $smlwidth = config::get('image.sm_thumb_width');
            $smlheight = config::get('image.sm_thumb_height');
            $ogThumb = date("Ymd"). DS . $thumbName;
            $bigThumb=date("Ymd"). DS . 'big_'.$thumbName;
            $midThumb=date("Ymd"). DS . 'mid_'.$thumbName;
            $smThumb=date("Ymd"). DS . 'sm_'.$thumbName;

            $image = \think\Image::open(IMG_UPLOADS_SP.$ogThumb);

            $image->thumb($bigwidth, $bigheight)->save(IMG_UPLOADS_SP.$bigThumb);
            $image->thumb($midwidth, $midheight)->save(IMG_UPLOADS_SP.$midThumb);
            $image->thumb($smlwidth, $smlheight)->save(IMG_UPLOADS_SP.$smThumb);
            $goods->og_thumb=$ogThumb;
            $goods->big_thumb=$bigThumb;
            $goods->mid_thumb=$midThumb;
            $goods->sm_thumb=$smThumb;

             $goods->goods_code=time().rand(111111,999999);//商品编号*/
            // dump($ogThumb); die;
        });
    }
}
