<extend file='resource/admin/wechat.php'/>
<block name="content">
    <ul class="nav nav-tabs" role="tablist">
        <li class="active"><a href="#" role="tab" data-toggle="tab">网站配置</a></li>
    </ul>
    <form action="" method="post" role="form" class="form-horizontal">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">微信配置</h3>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">公众号名称</label>
                    <div class="col-sm-10">
                        <input type="text" name="webname" value="{{$res['webname']}}" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">微信号</label>
                    <div class="col-sm-10">
                        <input type="text" name="account" value="{{$res['account']}}" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">AppId</label>
                    <div class="col-sm-10">
                        <input type="text" name="appid" value="{{$res['appid']}}" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">AppSecret</label>
                    <div class="col-sm-10">
                        <input type="text" name="appsecret" value="{{$res['appsecret']}}" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">token</label>
                    <div class="col-sm-10">
                        <input type="text" readonly="readonly" name="token" value="{{$res['token']}}" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">encodingaeskey</label>
                    <div class="col-sm-10">
                        <input type="text" readonly="readonly" name="encodingaeskey" value="{{$res['encodingaeskey']}}" class="form-control">
                    </div>
                </div>
            </div>
        </div>
        <button class="btn btn-primary">保存配置</button>
    </form>
</block>