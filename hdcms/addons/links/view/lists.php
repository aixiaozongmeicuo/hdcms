<extend file='resource/admin/module.php'/>
<block name="content">
    <!-- TAB NAVIGATION -->
    <ul class="nav nav-tabs" role="tablist">
        <li class="active"><a href="?m=links&action=controller/admin/lists">友情链接列表</a></li>
        <li><a href="?m=links&action=controller/admin/post">添加友情链接</a></li>
    </ul>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>链接名称</th>
            <th>连接地址</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <foreach from="$links" value="$v">
        <tr>
            <td>{{$v['id']}}</td>
            <td>{{$v['title']}}</td>
            <td>{{$v['url']}}</td>
            <td>
                <div class="btn-group">
                    <a href="?m=links&action=controller/admin/post&id={{$v['id']}}" class="btn btn-default">编辑</a>
                    <a href="javascript:;" onclick="remove({{$v['id']}})" class="btn btn-default">删除</a>
                </div>
            </td>
        </tr>
        </foreach>
        </tbody>
    </table>
    <script>
        function remove(id) {
            require(['hdjs'], function (hdjs) {
                hdjs.confirm('确认删除该关键词吗?', function () {
                    location.href = "{{url('admin/delete')}}&id="+id;
                })
            })
//            if(confirm('确认删除该关键词吗?')){
//                location.href = "{{url('admin/delete')}}&id="+id;
//            }
        }
    </script>

</block>