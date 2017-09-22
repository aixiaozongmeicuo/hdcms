<?php
/**
 * Created by PhpStorm.
 * User: hb
 * Date: 2017/9/18
 * Time: 20:24
 */
namespace module\base;
use houdunwang\request\Request;
use houdunwang\route\Controller;
use system\model\Module;

class Hdcontroller extends Controller {

    //存放路径信息的属性
    protected $template;
    //自动生成路径信息
    public function __construct()
    {
        Middleware::set('loginchecked', ['only' => ['lists']]);
        $m = Request::get('m');
        //查询当前模型的数据
        $data = Module::where('name',$m)->first();
        $module= $data['is_system']==1?'module':'addons';
        $this->template = $module.'/'.$m.'/view/';
    }

}