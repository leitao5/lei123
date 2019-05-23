<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:84:"D:\phpstudy\PHPTutorial\WWW\tpmall\public/../application/admin\view\index\index.html";i:1558593792;s:76:"D:\phpstudy\PHPTutorial\WWW\tpmall\application\admin\view\layout\layout.html";i:1558417939;}*/ ?>
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

<link rel="stylesheet" href="http://127.0.0.1/tpmall/public/static/admin/tuku/iconfont.css">
<body>
    <!-- 顶部开始 -->
    <div class="container">
        <div class="logo"><a href="./index.html">后台管理系统</a></div>
        <div class="left_open">
            <i title="展开左侧栏" class="iconfont">&#xe699;</i>
        </div>
        <ul class="layui-nav left fast-add" lay-filter="">
          <li class="layui-nav-item">
            <a href="javascript:;">+新增</a>
            <dl class="layui-nav-child"> <!-- 二级菜单 -->
              <dd><a onclick="x_admin_show('资讯','http://www.baidu.com')"><i class="iconfont">&#xe6a2;</i>资讯</a></dd>
              <dd><a onclick="x_admin_show('图片','http://www.baidu.com')"><i class="iconfont">&#xe6a8;</i>图片</a></dd>
               <dd><a onclick="x_admin_show('用户','http://www.baidu.com')"><i class="iconfont">&#xe6b8;</i>用户</a></dd>
            </dl>
          </li>
        </ul>
        <ul class="layui-nav right" lay-filter="">
          <li class="layui-nav-item">
            <a href="javascript:;">admin</a>
            <dl class="layui-nav-child"> <!-- 二级菜单 -->
              <dd><a onclick="x_admin_show('个人信息','http://www.baidu.com')">个人信息</a></dd>
              <dd><a onclick="x_admin_show('切换帐号','http://www.baidu.com')">切换帐号</a></dd>
              <dd><a href="/login.html">退出</a></dd>
            </dl>
          </li>
          <li class="layui-nav-item to-index"><a href="/">前台首页</a></li>
        </ul>
        
    </div>
    <!-- 顶部结束 -->
    <!-- 中部开始 -->
     <!-- 左侧菜单开始 -->
    <div class="left-nav">
      <div id="side-nav">
        <ul id="nav">


            <li>
                <a href="javascript:;">
                    <i class="iconfont  icon-shangpin"></i>
                    <cite>商品管理</cite>
                    <i class="iconfont nav_right">&#xe697;</i>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a _href="<?php echo url('Goods/lst'); ?>">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>商品列表</cite>

                        </a>
                    </li >
                    <li>
                        <a _href="<?php echo url('Category/lst'); ?>">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>商品分类</cite>

                        </a>
                    </li>
                    <li>
                        <a _href="<?php echo url('Brand/lst'); ?>">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>商品品牌</cite>

                        </a>
                    </li>

                    <li>
                        <a _href="<?php echo url('Type/lst'); ?>">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>商品类型</cite>

                        </a>
                    </li>

                    <li>
                        <a _href="<?php echo url('Attr/lst'); ?>">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>商品属性</cite>

                        </a>
                    </li>


                   <li>
                        <a href="javascript:;">
                            <i class="iconfont icon-huiyuan"></i>
                            <cite>会员管理</cite>
                            <i class="iconfont nav_right">&#xe697;</i>
                        </a>

                        <ul class="sub-menu">
                            <li>
                                <a _href="xxx.html">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>会员列表</cite>

                                </a>
                            </li >
                            <li>
                                <a _href="xx.html">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>会员删除</cite>

                                </a>
                            </li>
                            <li>
                                <a _href="xx.html">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>等级管理</cite>

                                </a>
                            </li>

                        </ul>
                    </li>
                </ul>
            </li>




            <li>
                <a href="javascript:;">
                    <i class="iconfont icon-huiyuan"></i>
                    <cite>会员管理</cite>
                    <i class="iconfont nav_right">&#xe697;</i>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a _href="member-list.html">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>会员列表</cite>
                            
                        </a>
                    </li >

                    <li>
                        <a _href="<?php echo url('MemberLevel/lst'); ?>">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>会员级别</cite>

                        </a>
                    </li >

                    <li>
                        <a _href="member-del.html">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>会员删除</cite>
                            
                        </a>
                    </li>



                </ul>
            </li>
            <li>
                <a href="javascript:;">
                    <i class="iconfont">&#xe723;</i>
                    <cite>订单管理</cite>
                    <i class="iconfont nav_right">&#xe697;</i>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a _href="order-list.html">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>订单列表</cite>
                        </a>
                    </li >
                </ul>
            </li>
            <li>
                <a href="javascript:;">
                    <i class="iconfont">&#xe726;</i>
                    <cite>管理员管理</cite>
                    <i class="iconfont nav_right">&#xe697;</i>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a _href="<?php echo url('Admin/lst'); ?>">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>管理员列表</cite>
                        </a>
                    </li >
                    <li>
                        <a _href="<?php echo url('AuthGroup/lst'); ?>">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>角色管理</cite>
                        </a>
                    </li >
                    <li>
                        <a _href="<?php echo url('AuthCate/lst'); ?>">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>权限分类</cite>
                        </a>
                    </li >
                    <li>
                        <a _href="<?php echo url('AuthRule/lst'); ?>">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>权限管理</cite>
                        </a>
                    </li >
                </ul>
            </li>
            <li>
                <a href="javascript:;">
                    <i class="iconfont">&#xe6ce;</i>
                    <cite>系统统计</cite>
                    <i class="iconfont nav_right">&#xe697;</i>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a _href="echarts1.html">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>拆线图</cite>
                        </a>
                    </li >
                    <li>
                        <a _href="echarts2.html">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>柱状图</cite>
                        </a>
                    </li>
                    <li>
                        <a _href="echarts3.html">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>地图</cite>
                        </a>
                    </li>
                    <li>
                        <a _href="echarts4.html">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>饼图</cite>
                        </a>
                    </li>
                    <li>
                        <a _href="echarts5.html">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>雷达图</cite>
                        </a>
                    </li>
                    <li>
                        <a _href="echarts6.html">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>k线图</cite>
                        </a>
                    </li>
                    <li>
                        <a _href="echarts7.html">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>热力图</cite>
                        </a>
                    </li>
                    <li>
                        <a _href="echarts8.html">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>仪表图</cite>
                        </a>
                    </li>
                </ul>
            </li>


            <li>
                <a href="javascript:;">
                    <i class="iconfont icon-navicon-wzgl"></i>
                    <cite>文章模块</cite>
                    <i class="iconfont nav_right">&#xe697;</i>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a _href="<?php echo url('Cate/lst'); ?>">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>文章分类</cite>
                        </a>
                    </li>
                    <li>
                        <a _href="<?php echo url('Article/lst'); ?>">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>文章列表</cite>
                        </a>
                    </li>

                    </li>
                </ul>
            </li>

            <li>
                <a href="javascript:;">
                    <i class="iconfont icon-tupian"></i>
                    <cite>图片管理</cite>
                    <i class="iconfont nav_right">&#xe697;</i>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a _href="<?php echo url('AlternateImg/lst'); ?>">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>轮播管理</cite>
                        </a>
                    </li>

                    <li>
                        <a _href="<?php echo url('Article/lst'); ?>">
                            <i class="iconfont">&#xe6a7;</i>
                                <cite>ueditor图片管理</cite>
                        </a>
                    </li>

                    </li>
                </ul>
            </li>


            <li>
                <a href="javascript:;">
                    <i class="iconfont icon-youqinglianjie"></i>
                    <cite>友情链接</cite>
                    <i class="iconfont nav_right">&#xe697;</i>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a _href="<?php echo url('Link/lst'); ?>">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>链接列表</cite>
                        </a>
                    </li>

                    </li>
                </ul>
            </li>
        </ul>


      </div>
    </div>
    <!-- <div class="x-slide_left"></div> -->
    <!-- 左侧菜单结束 -->
    <!-- 右侧主体开始 -->
    <div class="page-content">
        <div class="layui-tab tab" lay-filter="xbs_tab" lay-allowclose="false">
          <ul class="layui-tab-title">
            <li>我的桌面</li>
          </ul>
          <div class="layui-tab-content">
            <div class="layui-tab-item layui-show">
                <iframe src='<?php echo url('Index/welcome'); ?>' frameborder="0" scrolling="yes" class="x-iframe"></iframe>
            </div>
          </div>
        </div>
    </div>
    <div class="page-content-bg"></div>
    <!-- 右侧主体结束 -->
    <!-- 中部结束 -->
    <!-- 底部开始 -->
    <div class="footer">
        <div class="copyright">Copyright ©2017 All Rights Reserved</div>  
    </div>
    <!-- 底部结束 -->
    
</body>
</html>

