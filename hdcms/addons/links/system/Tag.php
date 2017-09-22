<?php
/**
 * Created by PhpStorm.
 * User: hb
 * Date: 2017/9/21
 * Time: 21:58
 */
namespace addons\links\system;
use addons\links\model\Links;
class Tag{

    public function tag($attr,$content){

        $row = isset($attr['row'])?$attr['row']:10;
//dd(Db::table('links')->limit($row)->get());
        $str = <<<hd
        <?php
        \$linksdata = Db::table('links')->limit($row)->get();
        foreach(\$linksdata as \$v){ ?>
        $content
        <?php } ?>
hd;

        return $str;
    }





}