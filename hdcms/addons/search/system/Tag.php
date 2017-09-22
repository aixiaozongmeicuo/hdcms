<?php
/**
 * Created by PhpStorm.
 * User: hb
 * Date: 2017/9/21
 * Time: 22:18
 */
namespace addons\search\system;
class Tag{


    public function hotkeyword($attr,$content){
        $row = isset($attr['row'])?$attr['row']:5;
//        dd(Db::table('search')->orderby('num','DESC')->limit($row)->get());
        $str = <<<hd
        <?php
        \$hotkeyword = Db::table('search')->orderby('num','DESC')->limit($row)->get();
        foreach(\$hotkeyword as \$v){ ?>
        $content
        <?php  } ?>
hd;

        return $str;
    }
}