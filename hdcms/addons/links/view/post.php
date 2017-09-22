<extend file='resource/admin/module.php'/>
<block name="content">
    <form action="" method="post" class="form-horizontal" role="form">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">添加链接</h3>
        </div>
        <div class="panel-body">
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">链接名称:</label>
                    <div class="col-sm-10">
                        <input type="text" name="title" class="form-control" value="{{$model['title']}}">
                    </div>
                </div>
            <div class="form-group">
                <label for="" class="col-sm-2 control-label">链接地址:</label>
                <div class="col-sm-10">
                    <input type="text" name="url" class="form-control" value="{{$model['url']}}">
                </div>
            </div>
        </div>
    </div>
        <div class="form-group">
            <div class="col-sm-10 col-sm-offset-2">
                <button type="submit" class="btn btn-primary">保存数据</button>
            </div>
        </div>
    </form>

</block>