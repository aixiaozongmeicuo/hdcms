<extend file='resource/admin/system.php'/>
<block name="content">
    <!-- TAB NAVIGATION -->
    <ul class="nav nav-tabs" role="tablist">
        <li class="active"><a href="{{u('system.back.lists')}}">备份列表</a></li>
    </ul>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>文件名</th>
            <th>备份路径</th>
            <th>文件大小</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <foreach from="$dirs" key="$k" value="$v">
        <tr>
            <td>{{$v['filename']}}</td>
            <td>{{$v['path']}}</td>
            <td>{{$v['size']}}</td>
            <td>
                <div class="btn-group">
                    <a href="{{u('system.back.recovery',['path' => $v['filename']])}}" class="btn btn-default">还原</a>
                    <a href="javascript:;" onclick="remove({{$v['filename']}})" class="btn btn-default">删除</a>
                </div>
            </td>
        </tr>
        </foreach>
        </tbody>
    </table>
    <script>
        function remove(path) {
            if(confirm('确认删除该备份吗?')){
                location.href = "{{u('system.back.delete')}}&path="+path;
            }
        }
    </script>

</block>