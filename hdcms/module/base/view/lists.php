<extend file='resource/admin/wechat.php'/>
<block name="content">
    <!-- TAB NAVIGATION -->
    <ul class="nav nav-tabs" role="tablist">
        <li class="active"><a href="?m=base&action=controller/wx/lists">文本回复列表</a></li>
        <li><a href="?m=base&action=controller/wx/post">添加文本回复</a></li>
    </ul>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>关键词</th>
            <th>回复内容</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <foreach from="$data" key="$k" value="$v">
        <tr>
            <td>{{$v['id']}}</td>
            <td>{{$v['keyword']}}</td>
            <td>{{$v['content']}}</td>
            <td>
                <div class="btn-group">
                    <a href="?m=base&action=controller/wx/post&id={{$v['id']}}" class="btn btn-default">编辑</a>
                    <a href="javascript:;" onclick="remove({{$v['id']}})" class="btn btn-default">删除</a>
                </div>
            </td>
        </tr>
        </foreach>
        </tbody>
    </table>
    <script>
        function remove(id) {
            if(confirm('确认删除吗?')){
                location.href = "?m=base&action=controller/wx/delete&id="+id;
            }
        }
    </script>

</block>