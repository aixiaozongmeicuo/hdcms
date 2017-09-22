<?php namespace system\tag;
use houdunwang\request\Request;
use houdunwang\view\build\TagBase;
use system\model\Module;

class Tag extends TagBase {
	/**
	 * 标签声明
	 * @var array
	 */
	public $tags = [
			'line' => [ 'block' => false ],
			'next' => [ 'block' => false ],
			'prev' => [ 'block' => false ],
			'category'  => [ 'block' => true, 'level' => 4 ],
			'slide'  => [ 'block' => true, 'level' => 4 ],
			'article'  => [ 'block' => true, 'level' => 4 ],
			'tag'  => [ 'block' => true, 'level' => 4 ],
	];



	//tag 标签
    //<tag action='links.tag' row='5'></tag>
	public function _tag( $attr, $content, &$view ) {

        $action = $attr['action'];
        $info = explode('.',$action);
        $model = Module::where('name',$info[0])->first();
        $module = $model['is_system']==1?'module':'addons';
        //组合类
        $class = $module."\\".$info[0].'\\system\\Tag';
//        return $class;
        //方法
        $a = $info[1];
        //实例化类
        $obj = new $class;

        return $obj->$a($attr, $content);
	}

	//分类列表
    public function _category( $attr, $content, &$view ) {
        //参数中$content代表的是当前标签所包裹的html内容
        $pid = isset($attr['pid']) ? $attr['pid'] : -1;
        $str = <<<php
        <?php
        \$db = Db::table('category');
        if($pid >= 0){
            \$db->where('pid',$pid);
        }
        \$data = \$db->get();
        foreach (\$data as \$v){
         \$v['url'] = __ROOT__ . "/?s=home/entry/lists&id=" . \$v['cid'];
         
         ?>
         $content
        <?php } ?>
php;
        return $str;

    }

    //轮播图标签
    public function _slide( $attr, $content, &$view ) {
//        $pid = isset($attr['pid']) ? $attr['pid'] : -1;

        $str = <<<php
        <?php
        \$db = Db::table('slider');
        \$data = \$db->get();
        foreach (\$data as \$v){
         \$v['thumb'] = __ROOT__ . '/' . \$v['thumb'];
         
         ?>
         $content
        <?php } ?>
php;
        return $str;

    }

    //文章展示
    public function _article( $attr, $content, &$view ) {
        $category_pid = isset($attr['category_pid']) ? $attr['category_pid'] : -1;
        $str = <<<php
        <?php
        \$db = Db::table('article');
        if($category_pid >= 0){
            \$db->where('category_pid',$category_pid);
        }
        \$data = \$db->get();
        foreach (\$data as \$vv){
         \$vv['url'] = __ROOT__ . "/?s=home/entry/content&id=" . \$vv['id'];
         
         ?>
         $content
        <?php } ?>
php;
        return $str;

    }


    //下一篇
    public function _next(){
        $str = <<<hd
        <?php
        \$id =Request::get('id');
        \$nextarticle = Db::table('article')->where('id','>',\$id)->first();
        if(\$nextarticle){
            echo "<a href='?s=home/entry/content&id={\$nextarticle['id']}'>".\$nextarticle['title']."</a>";        
        }else{
            echo "这是最后一篇文章";
        }
        ?>
hd;
        return $str;

    }

    //上一篇
    public function _prev(){
        $str = <<<hd
        <?php
        \$id =Request::get('id');
        \$nextarticle = Db::table('article')->where('id','<',\$id)->orderby('id','DESC')->first();
        if(\$nextarticle){
            echo "<a href='?s=home/entry/content&id={\$nextarticle['id']}'>".\$nextarticle['title']."</a>";        
        }else{
            echo "这是第一篇文章";
        }
        ?>
hd;
        return $str;

    }







}