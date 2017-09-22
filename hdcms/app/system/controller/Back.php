<?php namespace app\system\controller;

use houdunwang\dir\Dir;
use houdunwang\request\Request;
use houdunwang\route\Controller;

class Back extends Controller{

    //展示备份列表
    public function lists(){

        $dirs = Backup::getBackupDir('backup');
        return view('',compact('dirs'));
    }


    //备份数据表
    public function backup() {
        $config = [
            'size' => 200,//分卷大小单位KB
            'dir'  => 'backup/' . date( "Ymdhis" ),//备份目录
        ];
        $status = Backup::backup( $config, function ( $result ) {
            if ( $result['status'] == 'run' ) {
                //备份进行中
                echo view('message',['content' => $result['message']]);
//                echo $result['message'];
                //刷新当前页面继续下次
//                echo "<script>setTimeout(function()		{location.href='{$_SERVER['REQUEST_URI']}'},100);</script>";
            } else {
                //备份执行完毕
//                echo $result['message'];
                echo $this->setRedirect('system.back.lists')->success($result['message']);
            }

        } );
        if($status===false){
            //备份过程出现错误
            echo  Backup::getError();
        }
    }

    //还原备份
    public function recovery() {
        //要还原的备份目录
        $config=['dir'=>'backup/20170108122230'];
        $status = Backup::recovery( $config, function ( $result ) {
            if ( $result['status'] == 'run' ) {
                //还原进行中
                echo view('message',['content' => $result['message']]);
//                echo $result['message'];
                //刷新当前页面继续执行
//                echo "<script>setTimeout(function(){location.href='{$_SERVER['REQUEST_URI']}'},1000);</script>";
            } else {
                //还原执行完毕
//                echo $result['message'];
                echo $this->setRedirect('system.back.lists')->success($result['message']);
            }
        } );
        if($status===false){
            //还原过程出现错误
            echo  Backup::getError();
        }
    }

    //删除备份
    public function delete()
    {
        $dir = Request::get('path');
        Dir::del('backup/' . $dir);
        return $this->setRedirect('system.back.lists')->success('删除成功');

    }

}
