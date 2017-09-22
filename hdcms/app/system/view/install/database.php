<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
    <link href="{{__ROOT__}}/resource/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{__ROOT__}}/resource/css/font-awesome.min.css" rel="stylesheet">
    <script>
        window.hdjs = {};
        //组件目录必须绝对路径(在网站根目录时不用设置)
        window.hdjs.base = '{{__ROOT__}}/node_modules/hdjs';
        //上传文件后台地址
        window.hdjs.uploader = '?s=component/upload/uploader';
        //获取文件列表的后台地址
        window.hdjs.filesLists = '?s=component/upload/filesLists';
    </script>
    <script src="{{__ROOT__}}/node_modules/hdjs/static/requirejs/require.js"></script>
    <script src="{{__ROOT__}}/node_modules/hdjs/static/requirejs/config.js"></script>
    <script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<div class="container">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <a class="navbar-brand" href="#">HDCMS 1.0</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="#">后盾人 人人做后盾</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
    <div class="row">
        <div class="col-sm-3">
            <ul class="list-group">
                <li class="list-group-item">版权信息</li>
                <li class="list-group-item">环境检测</li>
                <li class="list-group-item active">初始数据</li>
                <li class="list-group-item">安装完成</li>
            </ul>
        </div>
        <form action="" class="form-horizontal" onsubmit="post(event)">
            <div class="col-sm-9">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">数据库连接配置</h3>
                    </div>
                    <div class="panel-body">

                        <div class="form-group">
                            <label class="col-sm-2 control-label">主机</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="host" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">帐号</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="user" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">密码</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" name="password" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">数据库</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="database" value="">
                            </div>
                        </div>

                    </div>
                </div>
                <div>
                    <a href="{{u('environment')}}" class="btn btn-default">上一步</a>
                    <button class="btn btn-success">下一步</button>
                </div>
            </div>
        </form>
    </div>
    <script>
        function post(event) {
           //组织form表单的默认动作
            event.preventDefault();
            //$.post: 第一个参数是提交的url,第二个参数,是提交的数据data,第三个就是回调的方法函数
            $.post('{{__URL__}}',$('form').serialize(),function (res) {
                console.log(res);
                if(res.valid == 1){
                    //代表连接数据库成功
                    require(['hdjs'], function (hdjs) {
                        hdjs.message(res.message,"{{u('system.install.tables')}}",'success');
                    })
                }else{
                    //代表连接数据库失败
                    require(['hdjs'], function (hdjs) {
                        hdjs.message('数据库连接失败','','error');
                    })
                }
            },'json')
        }
    </script>
    <div class="text-center" style="margin-top: 50px;">
        copyright houdunren.com
    </div>
</div>
</body>
</html>