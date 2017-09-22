<extend file='resource/admin/father.php'/>
<block name="content">
    <!-- TAB NAVIGATION -->
    <ul class="nav nav-tabs" role="tablist">
        <li class="active"><a href="">幻灯片列表</a></li>
        <li><a href="{{u('slider.post')}}">添加幻灯片</a></li>
    </ul>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>标题</th>
            <th>链接</th>
            <th>排序</th>
            <th>缩略图</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <foreach  from="$data" key="$k" value="$v">
        <tr>
            <td>{{$v['id']}}</td>
            <td>{{$v['title']}}</td>
            <td>{{$v['url']}}</td>
            <td>{{$v['orderby']}}</td>
            <td>
                <img src="{{$v['thumb']}}" style="width: 50px;">
            </td>
            <td>
                <div class="btn-group">
                    <a href="{{u('slider.post',['id'=>$v['id']])}}" class="btn btn-default">编辑</a>
                    <a href="javascript:;" onclick="remove({{$v['id']}})" class="btn btn-default">删除</a>
                </div>
            </td>
        </tr>
        </foreach>
        </tbody>
        <script>
            function remove(id) {
                if(confirm('确认删除吗?')){
                    location.href = "{{u('slider.delete')}}&id="+id;
                }
            }
        </script>
    </table>

</block>