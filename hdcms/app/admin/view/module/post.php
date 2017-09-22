<extend file='resource/admin/module.php'/>
<block name="content">
    <div class="panel panel-default">
        <ul class="nav nav-tabs" role="tablist">
            <li class="active"><a href="{{u('module.post')}}">设计模块</a></li>
        </ul>
        <div class="panel-body">
            <form action="" method="post" class="form-horizontal" role="form">
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">模块标识:</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" class="form-control" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">模块标题:</label>
                    <div class="col-sm-10">
                        <input type="text" name="title" class="form-control" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">预览图:</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input class="form-control" name="preview" readonly="" value="">
                            <div class="input-group-btn">
                                <button onclick="upImage(this)" class="btn btn-default" type="button">选择图片</button>
                            </div>
                        </div>
                        <div class="input-group" style="margin-top:5px;">
                            <img src="/hdcms/node_modules/hdjs/dist/static/image/nopic.jpg"
                                 class="img-responsive img-thumbnail" width="150">
                            <em class="close" style="position:absolute; top: 0px; right: -14px;" title="删除这张图片"
                                onclick="removeImg(this)">×</em>
                        </div>
                    </div>
                    <script>
                        require(['hdjs']);

                        //上传图片
                        function upImage() {
                            require(['hdjs'], function (hdjs) {
                                options = {
                                    multiple: false,//是否允许多图上传
                                    //data是向后台服务器提交的POST数据
                                    data: {name: '后盾人', year: 2099},
                                };
                                hdjs.image(function (images) {
                                    //上传成功的图片，数组类型
                                    $("[name='preview']").val(images[0]);
                                    $(".img-thumbnail").attr('src', images[0]);
                                }, options)
                            });
                        }

                        //移除图片
                        function removeImg(obj) {
                            $(obj).prev('img').attr('src', '/node_modules/hdjs/dist/static/image/nopic.jpg');
                            $(obj).parent().prev().find('input').val('');
                        }
                    </script>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">模块描述:</label>
                    <div class="col-sm-10">
                        <textarea name="resume" class="form-control" rows="10">{{$model['resume']}}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">作者:</label>
                    <div class="col-sm-10">
                        <input type="text" name="author" class="form-control" value="{{$model['author']}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">处理微信:</label>
                    <div class="col-sm-10">
                        <label class="col-sm-10">
                            <input type="checkbox" name="is_wechat" value="1"> 是
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-10 col-sm-offset-2">
                        <button type="submit" class="btn btn-primary">保存数据</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


</block>