<?php

namespace app\admin\model;

use think\Model;

class Admin extends Model
{
    //添加密码
    public function insertAdmin($data){
         $data['solt'] = make_password(6);
         $data['possword'] = md5( $data['possword'].$data['solt']);
         $data['create_time'] = time();
         return $data;
    }


    //更新管理员密码
    public function updatePass($data){
        //随机6个字符串
        if($data['possword'] == ''){
            unset($data['possword']);
            unset($data['solt']);
        }else{
            $data['solt'] = make_password(6);
            $data['possword'] = md5( $data['possword'].$data['solt']);
        }
        $data['create_time'] = time();
        return $data;
    }
}
