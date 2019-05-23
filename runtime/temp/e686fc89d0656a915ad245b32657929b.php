<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:86:"D:\phpstudy\PHPTutorial\WWW\tpmall\public/../application/admin\view\auth_rule\add.html";i:1558594801;s:76:"D:\phpstudy\PHPTutorial\WWW\tpmall\application\admin\view\layout\layout.html";i:1558417939;}*/ ?>
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


  <body>
    <div class="x-body">
        <form class="layui-form"  method="post" action="<?php echo url('AuthRule/add'); ?>">

            <div class="layui-form-item">
                <label for="cate_rule_id" class="layui-form-label">
                    <span class="x-red">*</span>所属分类
                </label>
                <div class="layui-input-inline">
                    <select name="cate_rule_id">
                        <?php foreach($authcate as $k=>$v): ?>
                        <option value="<?php echo $v['id']; ?>"><?php echo $v['auth_cate']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>


          <div class="layui-form-item">
              <label for="title" class="layui-form-label">
                  <span class="x-red">*</span>权限名
              </label>
              <div class="layui-input-inline">
                  <input type="text" id="title" name="title" required="" lay-verify="required"
                  autocomplete="off" class="layui-input">
              </div>
          </div>

          <div class="layui-form-item">
              <label for="rule" class="layui-form-label">
                  <span class="rule">*</span>权限规则名
              </label>
              <div class="layui-input-inline">
                  <input type="text" id="rule" name="rule" required="" lay-verify="required"
                  autocomplete="off" class="layui-input">
              </div>
          </div>


            <div class="layui-form-item">
                <label class="layui-form-label">是否启用</label>
                <div class="layui-input-block">
                    <input type="radio" name="status" value="1" title="是" checked=""><div class="layui-unselect layui-form-radio layui-form-radioed"><i class="layui-anim layui-icon"></i><span>是</span></div>
                    <input type="radio" name="status" value="0" title="否"><div class="layui-unselect layui-form-radio"><i class="layui-anim layui-icon"></i><span>否</span></div>
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
        layui.use(['form','layer'], function(){
            $ = layui.jquery;
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

          //监听提交
         /* form.on('submit(add)', function(data){
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
  </body>

</html>

