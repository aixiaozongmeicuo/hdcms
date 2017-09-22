
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>{{json_decode(v('config.content'),true)['webname']}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link href="{{__ROOT__}}/resource/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{__ROOT__}}/resource/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{__ROOT__}}/resource/css/hdcms.css" rel="stylesheet">
    <script>
        window.hdjs={};
        //组件目录必须绝对路径(在网站根目录时不用设置)
        window.hdjs.base = '/hdcms/node_modules/hdjs';
        //上传文件后台地址
        window.hdjs.uploader = '?s=component/upload/uploader';
        //获取文件列表的后台地址
        window.hdjs.filesLists = '?s=component/upload/filesLists';
    </script>
    <script src="{{__ROOT__}}/node_modules/hdjs/static/requirejs/require.js"></script>
    <script src="{{__ROOT__}}/node_modules/hdjs/static/requirejs/config.js"></script>
    <script>
        if (navigator.appName == 'Microsoft Internet Explorer') {
            if (navigator.userAgent.indexOf("MSIE 5.0") > 0 || navigator.userAgent.indexOf("MSIE 6.0") > 0 || navigator.userAgent.indexOf("MSIE 7.0") > 0) {
                alert('您使用的 IE 浏览器版本过低, 推荐使用 Chrome 浏览器或 IE8 及以上版本浏览器.');
            }
        }
    </script>
</head>
<body class="hdcms-login">
<div class="container logo">
    <div style="background: url('http://www.houdunwang.com/resource/images/logo.png') no-repeat; background-size: contain;height: 60px;"></div>
</div>
<div class="container well">
    <div class="row ">
        <div class="col-md-6">
            <form method="post" action="javascript:post();">
                <input type='hidden' name='csrf_token' value=''/>

                <input type='hidden' name='csrf_token' value=''/>
                <div class="form-group ">
                    <label>帐号</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-w fa-user"></i></div>
                        <input type="text" name="username" class="form-control input-lg"
                               placeholder="请输入帐号" value="">
                    </div>
                </div>
                <div class="form-group ">
                    <label>密码</label>

                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-w fa-key"></i></div>
                        <input type="password" name="password"
                               class="form-control input-lg" placeholder="请输入密码" value="">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-lg">登录</button>
            </form>
        </div>
        <div class="col-md-6">
            <div style="background: url('http://www.houdunwang.com/resource/images/houdunwang.jpg');background-size:100% ;height:230px;"></div>
        </div>
    </div>
    <script>
        function post() {
            require(['hdjs'], function (hdjs) {
                hdjs.submit({
                    //提效地址，不填时使用当前url
//                url: 'test/submit.php',
                    //提交的数据json格式，不添加时自动提交表单数据
//                data: '',
                    //操作成功时返回地址，不填写时回调上一页，可以使用refresh（默认),back,留空不操作等
                    successUrl: "{{u('admin.index.index')}}",
                    //请求结束后执行的回调函数，设置之后 successUrl将无效
//                callback:function(response){
//                    console.log(response)
//                }
                });
            })
        }
    </script>
    <div class="copyright">
        备案号:{{json_decode(v('config')['content'],true)['icpc']}} <br>
        联系电话:{{json_decode(v('config.content'),true)['phone']}}
    </div>
</div>
</body>
</html>