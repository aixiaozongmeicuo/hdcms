<extend file='resource/admin/module.php'/>
<block name="content">
    <!-- TAB NAVIGATION -->
    <ul class="nav nav-tabs" role="tablist">
        <li class="active"><a href="?m=links&action=controller/admin/lists">热门关键词列表</a></li>
    </ul>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>热门关键词</th>
            <th>搜索次数</th>
        </tr>
        </thead>
        <tbody>
        <foreach from="$data" value="$v">
        <tr>
            <td>{{$v['id']}}</td>
            <td>{{$v['keyword']}}</td>
            <td>{{$v['num']}}</td>
        </tr>
        </foreach>
        </tbody>
    </table>


</block>