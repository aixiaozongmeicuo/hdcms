<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>栏目页列表</title>
    <link rel="stylesheet" type="text/css" href="{{__TEMP__}}/css/list_article.css"/>
    <script src="{{__TEMP__}}/js/jquery-1.11.3.min.js" type="text/javascript"
            charset="utf-8"></script>
</head>
<body>
<!--头部-->
<div id="head">
    <img src="{{__TEMP__}}/images/logo.jpg" class="logo"/>
    <ul class="ad">
        <li>顶尖PHP培训机构</li>
        <li style="color: #ee782f;">IT技能培训首选后盾网！</li>
    </ul>
    <div class="right">
        <span>全国抢座热线</span>
        <p>400-682-3231</p>
    </div>
</div>
<!--头部结束-->
<!--导航条-->
<div id="menu">
    <div class="center">
        <a href="{{root_url()}}">后盾首页</a>
        <category pid="0">
            <if value="$v['cid'] == $article['category_pid']">
                <a href="{{$v['url']}}" class="cur">{{$v['cname']}}</a>
                <else/>
                <a href="{{$v['url']}}">{{$v['cname']}}</a>
            </if>

        </category>
    </div>
</div>
<!--导航条结束-->

<!--搜索区域-->
<div id="search">
    <span>热门关键词：</span>
    <tag action="search.hotkeyword">
        <a href="?m=search&action=controller/admin/search&keyword={{$v['keyword']}}">{{$v['keyword']}}</a>
    </tag>
    <form action="" method="get">
        <input type="text" placeholder="请输入搜索关键词" class="keyword" name="keyword"/>
        <input type="hidden" name="m" value="search">
        <input type="hidden" name="action" value="controller/admin/search">
        <input type="submit" value="" class="sub"/>
    </form>
</div>
<!--搜索区域结束-->

<img class="category_thumb" src="{{__ROOT__.'/'.$article[0]['thumb']}}"
     style="display: block;margin: 0 auto;"/>
<style>
    .category_thumb {
        width: 960px;
        height: 431px;
    }
</style>
<!--大区域-->
<div class="main">
    <!--左侧-->
    <div class="left">
        <!--面包屑导航-->
        <p class="position">
            <span>当前位置：</span>
            <a href="">首页</a>
<!--            »-->
<!--            <a href="#">{{$category['cname']}}</a>-->
        </p>
        <ul>
            <foreach from="$article" value="$v">
                <li>
                    <a href="javascript:;" class="title">{{$v['title']}}</a>
                    <span class="time">[ {{$v['created_at']}} ]</span>
                    <p class="desc">{{$v['description']}}</p>
                </li>
            </foreach>
        </ul>
        <!--分页-->
        <div class="pagelist">

            <style>
                .pagination li {
                    float: left !important;
                }

                .pagination li.active a {
                    background-color: green;
                    color: #fff !important;
                }
            </style>
        </div>
        <!--分页结束-->
    </div>
    <!--左侧结束-->


    <!--右侧-->
    <div class="right">
        <h3>栏目导航</h3>
        <category pid="0">
        <dl>
            <dt><a href="{{$v['url']}}">{{$v['cname']}}</a></dt>

        </dl>
        </category>
    </div>
    <!--右侧结束-->
</div>
<!--大区域结束-->

<!--底部-->
<div id="footer">
    <p>北京后盾计算机技术培训有限责任公司</p>
    <p>京ICP备12048441号-3</p>
</div>
<!--底部结束-->

</body>
</html>
