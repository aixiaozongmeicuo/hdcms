<extend file='resource/admin/father.php'/>
<block name="content">
    <!-- TAB NAVIGATION -->
    <ul class="nav nav-tabs" role="tablist">
        <li class="active"><a href="javascript:;">文章列表</a></li>
        <li><a href="{{u('article.post')}}">添加文章</a></li>
    </ul>
    <table class="table table-hover">
        <thead>
        <tr>
            <th width="100">ID</th>
            <th>文章标题</th>
            <th>文章作者</th>
            <th>缩略图</th>
            <th>点击数</th>
            <th width="150">操作</th>
        </tr>
        </thead>
        <tbody>
        <foreach from="$data" value="$v">
            <tr>
                <td>{{$v['id']}}</td>
                <td>{{$v['title']}}</td>
                <td>{{$v['author']}}</td>
                <td>
                    <img src="{{$v['thumb']}}" style="width: 50px;">
                </td>
                <td>{{$v['click']}}</td>
                <td>
                    <div class="btn-group btn-group-sm">
                        <a href="{{u('article.post',['id' => $v['id']])}}" class="btn btn-default">编辑</a>
                        <a href="javascript:;" onclick="remove({{$v['id']}})" class="btn btn-default">删除</a>
                    </div>
                </td>
            </tr>
        </foreach>
        </tbody>
    </table>
    <script>
        function remove(id) {
            if (confirm('确定要删除吗？')){
                location.href="{{u('article.delete')}}&id="+id;
            }
        }

    </script>
    {{$data->links();}}
</block>