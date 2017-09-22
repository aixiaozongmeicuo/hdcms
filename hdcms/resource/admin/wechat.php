<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>{{json_decode(v('config.content'),true)['webname']}}</title>
    <meta name="csrf-token" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
    <link href="{{__ROOT__}}/resource/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{__ROOT__}}/resource/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{__ROOT__}}/resource/css/hdcms.css" rel="stylesheet">
    <script>
        window.hdjs = {};
        //组件目录必须绝对路径(在网站根目录时不用设置)
        window.hdjs.base = '/node_modules/hdjs';
        //上传文件后台地址
        window.hdjs.uploader = '?s=component/upload/uploader';
        //获取文件列表的后台地址
        window.hdjs.filesLists = '?s=component/upload/filesLists';
    </script>
    <script src="/node_modules/hdjs/static/requirejs/require.js"></script>
    <script src="/node_modules/hdjs/static/requirejs/config.js"></script>
    <script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body class="site">
<div class="container-fluid admin-top">
    <!--导航-->
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <ul class="nav navbar-nav">

                    <li>
                        <a href="{{u('admin.index.index')}}">
                            <i class="fa fa-reply-all"></i> 返回首页
                        </a>
                    </li>

                    <li class="top_menu">
                        <a href="{{u('admin.article.lists')}}" class="quickMenuLink">
                            <i class="'fa-w fa fa-cubes"></i>
                            文章系统
                        </a>
                    </li>
                    <li class="top_menu active">
                        <a href="{{u('wechat.config.setting')}}" class="quickMenuLink">
                            <i class="'fa-w fa fa-cubes"></i> 微信管理 </a>
                    </li>
                    <li class="top_menu">
                        <a href="{{u('admin.user.changePassword')}}" class="quickMenuLink">
                            <i class="'fa-w fa fa-cubes"></i> 系统管理 </a>
                    </li>
                    <li class="top_menu">
                        <a href="{{u('admin.module.lists')}}" class="quickMenuLink">
                            <i class="'fa-w fa fa-cubes"></i> 模块管理 </a>
                    </li>
                </ul>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="fa fa-w fa-user"></i>
                            {{Session::get('username')}}<span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="{{u('admin.user.changePassword')}}">修改密码</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{u('admin.user.loginout')}}">退出</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!--导航end-->
</div>
<!--主体-->
<div class="container-fluid admin_menu">
    <div class="row">
        <div class="col-xs-12 col-sm-3 col-lg-2 left-menu">
            <div class="search-menu">
                <input class="form-control input-lg" type="text" placeholder="输入菜单名称可快速查找"
                       onkeyup="search(this)">
            </div>
            <!--扩展模块动作 start-->
            <div class="panel panel-default">
                <!--系统菜单-->


                <div class="panel-heading">
                    <h4 class="panel-title">连接管理</h4>
                    <a class="panel-collapse" data-toggle="collapse" href="javascript:;">
                        <i class="fa fa-chevron-circle-down"></i>
                    </a>
                </div>
                <ul class="list-group menus">
                    <li class="list-group-item" id="3">
                        <a class="pull-right append_url" href="">
                            <i class="fa fa-plus"></i>
                        </a>
                        <a href="?s=wechat/config/setting" class="quickMenuLink">
                            连接设置
                        </a>
                    </li>
                </ul>
                <div class="panel-heading">
                    <h4 class="panel-title">微信设置</h4>
                    <a class="panel-collapse" data-toggle="collapse" href="javascript:;">
                        <i class="fa fa-chevron-circle-down"></i>
                    </a>
                </div>
                <ul class="list-group menus">
                    <li class="list-group-item" id="3">
                        <a class="pull-right append_url" href="">
                            <i class="fa fa-plus"></i>
                        </a>
                        <a href="?m=base&action=controller/wx/lists" class="quickMenuLink">
                            文本回复
                        </a>
                    </li>
                    <li class="list-group-item" id="3">
                        <a class="pull-right append_url" href="">
                            <i class="fa fa-plus"></i>
                        </a>
                        <a href="{{u('wechat.system.post')}}" class="quickMenuLink">
                            系统回复
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-xs-12 col-sm-9 col-lg-10">
            <!--有模块管理时显示的面包屑导航-->
            <blade name="content"/>
        </div>
    </div>
</div>
<div class="master-footer">
    <a href="{{__ROOT__}}">猎人训练</a>
    <a href="http://www.hdphp.com">开源框架</a>
    <a href="http://bbs.houdunwang.com">后盾论坛</a>
    <br>
    备案号:{{json_decode(v('config.content'),true)['icpc']}} <br>
    联系电话:{{json_decode(v('config.content'),true)['phone']}}
</div>

<!--<script>-->
<!--    require(['bootstrap']);-->
<!--</script>-->


</body>
</html>

<style>
    table {
        table-layout: fixed;
    }
</style>