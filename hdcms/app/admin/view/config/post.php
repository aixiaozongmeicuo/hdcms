<extend file='resource/admin/father.php'/>
<block name="content">
    <form action="" method="post" class="form-horizontal" role="form">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">网站管理</h3>
        </div>
        <div class="panel-body">
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">网站名称:</label>
                    <div class="col-sm-10">
                        <input type="text" name="webname" class="form-control" value="{{$re['webname']}}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">备案号:</label>
                    <div class="col-sm-10">
                        <input type="text" name="icpc" class="form-control" value="{{$re['icpc']}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">联系电话:</label>
                    <div class="col-sm-10">
                        <input type="text" name="phone" class="form-control" value="{{$re['phone']}}">
                    </div>
                </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">文章管理</h3>
        </div>
        <div class="panel-body">
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">显示条数:</label>
                    <div class="col-sm-10">
                        <input type="text" name="row" class="form-control" value="{{$re['row']}}">
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