<extend file='resource/admin/module.php'/>
<block name="content">
    <!-- TAB NAVIGATION -->
    <ul class="nav nav-tabs" role="tablist">
        <li class="active"><a href="{{u('module.lists')}}">模块列表</a></li>
        <li><a href="{{u('module.post')}}">设计模块</a></li>
    </ul>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>模块标识</th>
            <th>模块名称</th>
            <th>模块图片</th>
            <th width="150">操作</th>
        </tr>
        </thead>
        <tbody>
        <foreach from="$data" value="$v">
            <tr>
                <td>{{$v['name']}}</td>
                <td>{{$v['title']}}</td>
                <td>
                    <img src="{{$v['preview']}}" style="height: 60px;">
                </td>
                <td>
                    <div class="btn-group btn-group-sm">
                        <if value="$v['isInstall']">
                            <a href="javascript:;" onclick="remove('{{$v["name"]}}')" class="btn btn-danger">卸载</a>
                            <else/>
                            <a href="javascript:;" onclick="install('{{$v["name"]}}')" class="btn btn-success">安装</a>
                        </if>

                    </div>
                </td>
            </tr>
        </foreach>
        </tbody>
    </table>
    <script>
        function remove(name) {
            require(['hdjs'], function (hdjs) {
                hdjs.confirm('确定卸载吗?', function () {
                    location.href="?s=admin/module/delete&name="+name;
                })
            })
        }
        function install(name) {
            require(['hdjs'], function (hdjs) {
                hdjs.confirm('确定安装吗?', function () {
                    location.href="?s=admin/module/install&name="+name;
                })
            })
        }
    </script>

</block>