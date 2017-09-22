<extend file='resource/admin/father.php'/>
<block name="content">
    <!-- TAB NAVIGATION -->
    <ul class="nav nav-tabs" role="tablist">
        <li class="active"><a href="">分类列表</a></li>
        <li><a href="{{u('category.post')}}">添加分类</a></li>
    </ul>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>分类名称</th>
            <th>排序</th>
            <th>PID</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <foreach  from="$data" key="$k" value="$v">
        <tr>
            <td>{{$v['cid']}}</td>
            <td>{{$v['_cname']}}</td>
            <td>{{$v['orderby']}}</td>
            <td>{{$v['pid']}}</td>
            <td>
                <div class="btn-group">
                    <a href="{{u('category.post',['cid'=>$v['cid']])}}" class="btn btn-default">编辑</a>
                    <a href="javascript:;" onclick="remove({{$v['cid']}})" class="btn btn-default">删除</a>
                </div>
            </td>
        </tr>
        </foreach>
        </tbody>
        <script>
            function remove(cid) {
                if(confirm('确认删除吗?')){
                    location.href = "{{u('category.delete')}}&cid="+cid;
                }
            }
        </script>
    </table>

</block>