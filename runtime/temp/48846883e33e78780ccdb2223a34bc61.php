<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:82:"D:\phpstudy\PHPTutorial\WWW\tpmall\public/../application/admin\view\goods\add.html";i:1558582716;s:76:"D:\phpstudy\PHPTutorial\WWW\tpmall\application\admin\view\layout\layout.html";i:1558417939;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>欢迎页面-X-admin2.0</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />

    <link rel="stylesheet" href="http://127.0.0.1/tpmall/public/static/admin/css/font.css">
    <link rel="stylesheet" href="http://127.0.0.1/tpmall/public/static/admin/css/xadmin.css">
    <script type="text/javascript" src="http://127.0.0.1/tpmall/public/static/admin/js/jquery.min.js"></script>
    <script type="text/javascript" src="http://127.0.0.1/tpmall/public/static/admin/lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="http://127.0.0.1/tpmall/public/static/admin/js/xadmin.js"></script>


    <!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
    <!--[if lt IE 9]>
    <script src="http://127.0.0.1/tpmall/public/static/admin/js/html5.min.js"></script>
    <script src="http://127.0.0.1/tpmall/public/static/admin/js/respond.min.js"></script>
    <![endif]-->
</head>

<link rel="stylesheet" type="text/css" href="http://127.0.0.1/tpmall/public/static/admin/lib/diyUpload/diyUpload/css/webuploader.css">
<link rel="stylesheet" type="text/css" href="http://127.0.0.1/tpmall/public/static/admin/lib/diyUpload/diyUpload/css/diyUpload.css">

<script type="text/javascript" src="http://127.0.0.1/tpmall/public/static/admin/lib/diyUpload/diyUpload/js/webuploader.html5only.min.js"></script>
<script type="text/javascript" src="http://127.0.0.1/tpmall/public/static/admin/lib/diyUpload/diyUpload/js/diyUpload.js"></script>


<script src="http://127.0.0.1/tpmall/public/static/admin/lib/ueditor/ueditor.config.js"></script>
<script src="http://127.0.0.1/tpmall/public/static/admin/lib/ueditor/ueditor.all.min.js"></script>
<script src="http://127.0.0.1/tpmall/public/static/admin/lib/ueditor/lang/zh-cn/zh-cn.js"></script>

<style>
    .layui-form-label{
        width: 10%;
    }
</style>

  <body>
    <div class="x-body">
        <form class="layui-form"   method="post" action="<?php echo url('Goods/add'); ?>">
            <div class="layui-tab">
                <ul class="layui-tab-title">
                    <li class="layui-this"> 基本信息</li>
                    <li>描述信息</li>
                    <li>会员价格</li>
                    <li>商品属性</li>
                    <li>商品相册</li>
                </ul>
                <div class="layui-tab-content">
                    <div class="layui-tab-item layui-show">
                        <div class="layui-form-item">
                            <label for="username" class="layui-form-label">
                                <span class="x-red">*</span>商品名称
                            </label>
                            <div class="layui-input-inline">
                                <input type="text" id="username" name="goods_name" required="" lay-verify="required"
                                       autocomplete="off" class="layui-input">
                            </div>
                        </div>

                        <div class="layui-form-item">
                            <label for="username" class="layui-form-label">
                                <span class="x-red">*</span> 商品主图
                            </label>
                            <div class="layui-input-inline">
                                <div id="test123"  ></div>
                                <input type="hidden" id="cate_img" name="og_thumb" required="" lay-verify="required"
                                       autocomplete="off" class="layui-input" value="">
                            </div>
                        </div>

                        <div class="layui-form-item">
                            <label class="layui-form-label">是否上架</label>
                            <div class="layui-input-block">
                                <input type="radio" name="on_sale" value="1" title="是" checked=""><div class="layui-unselect layui-form-radio layui-form-radioed"><i class="layui-anim layui-icon"></i><span>是</span></div>
                                <input type="radio" name="on_sale" value="0" title="否"><div class="layui-unselect layui-form-radio"><i class="layui-anim layui-icon"></i><span>否</span></div>
                            </div>
                        </div>


                        <div class="layui-form-item">
                            <label for="username" class="layui-form-label">
                                <span class="x-red">*</span>商品所属分类
                            </label>
                            <div class="layui-input-inline">
                                <select name="category_id">
                                    <option value="">选择分类</option>
                                    <?php if(is_array($CategoryRes) || $CategoryRes instanceof \think\Collection || $CategoryRes instanceof \think\Paginator): $i = 0; $__LIST__ = $CategoryRes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v1): $mod = ($i % 2 );++$i;?>
                                    <option value="<?php echo $v1['id']; ?>" ><?php echo str_repeat('-', $v1['level']*4)?><?php echo $v1['cate_name']; ?></option>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>

                            </div>
                        </div>

                        <div class="layui-form-item">
                            <label for="username" class="layui-form-label">
                                <span class="x-red">*</span>所属品牌
                            </label>
                            <div class="layui-input-inline">
                                <select name="brand_id">
                                    <option value="">选择品牌</option>
                                    <?php if(is_array($brandRes) || $brandRes instanceof \think\Collection || $brandRes instanceof \think\Paginator): $i = 0; $__LIST__ = $brandRes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                                    <option value="<?php echo $v['id']; ?>"> <?php echo $v['brand_name']; ?></option>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>

                                </select>

                            </div>
                        </div>

                        <div class="layui-form-item">
                        <label for="username" class="layui-form-label">
                            <span class="x-red">*</span>市场价
                        </label>
                        <div class="layui-input-inline">
                            <input type="text" id="username" name="markte_price" required="" lay-verify="required"
                                   autocomplete="off" class="layui-input">
                        </div>
                    </div>

                        <div class="layui-form-item">
                            <label for="username" class="layui-form-label">
                                <span class="x-red">*</span>本店价
                            </label>
                            <div class="layui-input-inline">
                                <input type="text" id="username" name="shop_price" required="" lay-verify="required"
                                       autocomplete="off" class="layui-input">
                            </div>
                        </div>

                        <div class="layui-form-item">
                            <label for="username" class="layui-form-label">
                                <span class="x-red">*</span>重量
                            </label>
                            <div class="layui-input-inline" style="width: 5%;">
                                <input  type="text" id="username" name="goods_weight" required="" lay-verify="required"
                                       autocomplete="off" class="layui-input" >
                            </div>
                                <div class="layui-inline"  style="width: 3%;">
                                <select name="weight_unit">
                                    <option value="kg"> kg</option>
                                    <option value="g">g</option>
                                </select>
                                </div>
                        </div>


                      <!--  <div class="layui-form-item">

                            <div class="layui-inline">
                                <label class="layui-form-label">范围</label>
                                <div class="layui-input-inline" style="width: 100px;">
                                    <input type="text" name="price_min" placeholder="￥" autocomplete="off" class="layui-input">
                                </div>
                                <div class="layui-form-mid">-</div>
                                <div class="layui-input-inline" style="width: 100px;">
                                    <input type="text" name="price_max" placeholder="￥" autocomplete="off" class="layui-input">
                                </div>
                            </div>

                            <div class="layui-inline">
                                <label class="layui-form-label">密码</label>
                                <div class="layui-input-inline" style="width: 100px;">
                                    <input type="password" name="" autocomplete="off" class="layui-input">
                                </div>
                            </div>

                        </div>-->

                    </div>
                   <!-- 基本信息结束-->
                    <div class="layui-tab-item">

                        <div class="layui-form-item layui-form-text">
                           <!-- <label for="desc" class="layui-form-label">
                               商品详情
                            </label>-->
                            <div class="layui-input-block">
                                <textarea placeholder="请输入内容"  name="goods_des"   id="content"></textarea>
                            </div>
                        </div>
                    </div>
                    <!-- 描述信息结束-->

                    <div class="layui-tab-item">
                        <?php if(is_array($mlRes) || $mlRes instanceof \think\Collection || $mlRes instanceof \think\Paginator): $i = 0; $__LIST__ = $mlRes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ml): $mod = ($i % 2 );++$i;?>
                        <div class="layui-form-item">
                            <label for="username" class="layui-form-label">
                              <?php echo $ml['level_name']; ?>
                            </label>
                            <div class="layui-input-inline">
                                <input type="text" id="username" name="mp[<?php echo $ml['id']; ?>]"
                                       autocomplete="off" class="layui-input">
                            </div>
                        </div>
                        <?php endforeach; endif; else: echo "" ;endif; ?>


                </div>
                  <!--  会员价格结束-->

                    <div class="layui-tab-item">


                        <div class="layui-form-item">
                            <label for="username" class="layui-form-label">
                                <span class="x-red">*</span>商品类型
                            </label>
                            <div class="layui-input-inline">
                                <select name="type_id" lay-filter="type_id">
                                    <option value="">选择类型</option>
                                    <?php if(is_array($typeRes) || $typeRes instanceof \think\Collection || $typeRes instanceof \think\Paginator): $i = 0; $__LIST__ = $typeRes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$type): $mod = ($i % 2 );++$i;?>
                                    <option id="aaaa" value="<?php echo $type['id']; ?>"><?php echo $type['type_name']; ?></option>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>

                            </div>
                        </div>


                <!--    <div class="layui-form-item">
                        <label for="username" class="layui-form-label">
                            <span class="x-red">*</span>颜色
                        </label>
                        <div class="layui-input-inline">
                            <select name="type_id" lay-filter="type_id">
                                <option value="">选择类型</option>
                                <?php if(is_array($typeRes) || $typeRes instanceof \think\Collection || $typeRes instanceof \think\Paginator): $i = 0; $__LIST__ = $typeRes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$type): $mod = ($i % 2 );++$i;?>
                                <option id="aaaa" value="<?php echo $type['id']; ?>"><?php echo $type['type_name']; ?></option>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                                <input type="text" id="username" name="title" required="" lay-verify="required"
                                       autocomplete="off" class="layui-input" placeholder="价格">
                            </select>

                        </div>
                    </div>



                        <div class="layui-form-item">
                        <label for="username" class="layui-form-label">
                            <span class="x-red">*</span>所属类型
                        </label>
                        <div class="layui-input-inline">
                            <select name="type_id" lay-filter="type_id">
                                <option value="">选择类型</option>
                                <?php if(is_array($typeRes) || $typeRes instanceof \think\Collection || $typeRes instanceof \think\Paginator): $i = 0; $__LIST__ = $typeRes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$type): $mod = ($i % 2 );++$i;?>
                                <option id="aaaa" value="<?php echo $type['id']; ?>"><?php echo $type['type_name']; ?></option>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>

                        </div>
                    </div>

                        <div class="layui-form-item">
                            <label for="username" class="layui-form-label">
                                <span class="x-red">*</span>材质
                            </label>
                            <div class="layui-input-inline">
                                <select name="type_id" lay-filter="type_id">
                                    <option value="">选择类型</option>
                                    <?php if(is_array($typeRes) || $typeRes instanceof \think\Collection || $typeRes instanceof \think\Paginator): $i = 0; $__LIST__ = $typeRes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$type): $mod = ($i % 2 );++$i;?>
                                    <option id="aaaa" value="<?php echo $type['id']; ?>"><?php echo $type['type_name']; ?></option>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>

                            </div>
                        </div>


                        <div class="layui-form-item">
                            <label for="username" class="layui-form-label">
                                <span class="x-red">*</span>材料
                            </label>
                            <div class="layui-input-inline">
                                <input type="text" id="username" name="title" required="" lay-verify="required"
                                       autocomplete="off" class="layui-input">
                            </div>
                        </div>-->







                        <div id="attr_list">
                        <!-- 属性显示  -->
                    </div>
                </div>
                  <!--  商品属性结束-->
                    <div class="layui-tab-item">内容5

                    </div>
                  <!--  商品相册结束-->
                </div>
            </div>


          <div class="layui-form-item">
              <label for="L_repass" class="layui-form-label">
              </label>
              <button  class="layui-btn" lay-filter="add" lay-submit="">
                  增加
              </button>
          </div>
      </form>
    </div>
    <script>



        layui.use(['form','jquery','layer','element'], function(){
            var $ = jQuery = layui.$;
          var form = layui.form
          ,layer = layui.layer;
        
          //自定义验证规则
          form.verify({
            nikename: function(value){
              if(value.length < 5){
                return '昵称至少得5个字符啊';
              }
            }
            ,pass: [/(.+){6,12}$/, '密码必须6到12位']
            ,repass: function(value){
                if($('#L_pass').val()!=$('#L_repass').val()){
                    return '两次密码不一致';
                }
            }
          });

            form.on('select(type_id)', function(data){
                var type_id = data.value;
                $.ajax({
                    type: 'post',
                    url: "<?php echo url('Attr/ajaxGetAttr'); ?>",
                    data:{type_id:type_id},
                    dataType: 'json',
                    success: function(datas){
                        var html="";
                        console.log(datas);
                        $(datas).each(function(k,v){
                       /* <div class="layui-form-item">
                                <label for="username" class="layui-form-label">
                                <span class="x-red">*</span>重量
                                </label>
                                <div class="layui-input-inline" style="width: 5%;">
                                <input  type="text" id="username" name="title" required="" lay-verify="required"
                            autocomplete="off" class="layui-input" >
                                </div>
                                <div class="layui-inline"  style="width: 3%;">
                                <select name="goods_weight">
                                <option value="kg"> kg</option>
                                <option value="g">g</option>
                                </select>
                                </div>

                                </div>*/
                            if(v.attr_type == 1){
                                html+='<div class="layui-form-item">';
                                html+='<label for="username" class="layui-form-label">';
                                html+=v.attr_name;
                                html+='</label>';
                                html+='<div class="layui-input-inline" style="width: 5%;"><a class=\'abtn\' onclick=\'addrow(this);\' href=\'#\'>[+]</a>';
                                html+="<select name='goods_attr["+v.id+"][]'>";
                                html+='<option value="">选择类型</option>';
                                var attrValuesArr=v.attr_values.split(",");
                                for(var i=0; i<attrValuesArr.length; i++){
                                    html+='<option value='+attrValuesArr[i]+'>'+attrValuesArr[i]+'</option>'
                                }
                                html+="</select>";
                                html+=' <div class="layui-inline"  >';
                                html+='<div>';
                                html+='<input type="text"  name=goods_attr['+v.id+']  autocomplete="off" class="layui-input" placeholder="价格">';
                                    '
                                html+='</div>';
                                html+='</div>';
                                html+='</div>';
                                html+='</div>';

                            }else if(v.attr_type == 2){
                                 if(v.attr_values){
                                     html+='<div class="layui-form-item">';
                                     html+='<label for="username" class="layui-form-label">';
                                     html+=v.attr_name;
                                     html+='</label>';
                                     html+='<div class="layui-input-inline">';
                                     html+="<select name='goods_attr["+v.id+"][]'>";
                                     html+='<option value="">选择类型</option>';
                                     var attrValuesArr=v.attr_values.split(",");
                                     for(var i=0; i<attrValuesArr.length; i++){
                                         html+='<option value='+attrValuesArr[i]+'>'+attrValuesArr[i]+'</option>'
                                     }
                                     html+="</select>";
                                     html+='</div>';
                                     html+='</div>';
                                 }else{
                                 html+='<div class="layui-form-item">';
                                 html+='<label for="username" class="layui-form-label">';
                                 html+=v.attr_name;
                                 html+='</label>';
                                 html+='<div class="layui-input-inline">';
                                 html+='<input type="text"  name=goods_attr['+v.id+']  >';
                                 html+='</div>';
                                 html+='</div>';

                                 }
                            }

                        });

                        $("#attr_list").html(html);
                        form.render();

                    }
                });
            });



        /*  //监听提交
          form.on('submit(add)', function(data){
            console.log(data);
            //发异步，把数据提交给php
            layer.alert("增加成功", {icon: 6},function () {
                // 获得frame索引
                var index = parent.layer.getFrameIndex(window.name);
                //关闭当前frame
                parent.layer.close(index);
            });
            return false;
          });*/
          
          
        });
    </script>
    <script>
        $('#test123').diyUpload({
            url:'<?php echo url('Goods/upload'); ?>',
            dataType:"json",
            success:function( data ) {
            console.log(data._raw);
            //var tmpObj = '<input type="text" name="cat_img[]" value="'+data.imgUrl+'" class="layui-input">';
            $('#cate_img').val(data._raw);
            //   form.render();
        },
            error:function( err ) {
                console.info( err );
            },
        // 最大上传的文件数量, 总文件大小,单个文件大小(单位字节);
            fileNumLimit : 50,
            fileSizeLimit : 500000 * 1024,
            fileSingleSizeLimit : 50000 * 1024,
        });

        //实例化编辑器
        //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
        UE.getEditor('content',{initialFrameWidth:800,initialFrameHeight:400,});
    </script>
  </body>

</html>

