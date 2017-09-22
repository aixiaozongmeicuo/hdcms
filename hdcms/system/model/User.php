<?php namespace system\model;
use houdunwang\model\Model;
class User extends Model{
	//数据表
	protected $table = "user";

	//允许填充字段
	protected $allowFill = [ '*'];

	//禁止填充字段
	protected $denyFill = [ ];

	//自动验证
	protected $validate=[
		//['字段名','验证方法','提示信息',验证条件,验证时间]
	];

	//自动完成
	protected $auto=[
		//['字段名','处理方法','方法类型',验证条件,验证时机]
        ['oldpassword','required','密码必须要填写',self::MUST_VALIDATE,self::MODEL_BOTH]
	];

	//自动过滤
    protected $filter=[
        //[表单字段名,过滤条件,处理时间]
    ];

	//时间操作,需要表中存在created_at,updated_at字段
	protected $timestamps=true;


    //登录验证
    public static function login($data){
        //用户名和密码不存在
        if (empty($data['username']) ||empty($data['password'])){
            return  ['valid'=>0,'message'=>'用户名和密码不能为空'];
        }
        //判断用户名是否存在
        //获得该用户的信息
        $userinfo = self::where('username',$data['username'])->first();
        if (empty($userinfo)){
            return ['valid'=>0,'message'=>'输入的用户名不存在'];
        }
        //判断密码是否正确
        if (!password_verify($data['password'], $userinfo['password'])){
            return ['valid'=>0,'message'=>'输入的密码不正确'];
        }
        //设置session
        Session::set('userid',$userinfo["id"]);
        Session::set('username',$userinfo["username"]);
        return ['valid'=>1,'message'=>'登录成功'];
    }


    //修改密码
    public  function changePassword($data){
        //获得该用户的信息
        $userid = Session::get('userid');
        $info = $this->find($userid);
        //判断初始密码是否正确
        if (!password_verify($data['oldpassword'], $info['password'])){
            $this->setError(['你输入的初始密码不正确']);
            return false;
        }
        //判断新密码和确认密码是否一致
        if ($data['password'] != $data['password_confirm']){
            $this->setError(['新密码和确认密码不一致']);
            return false;
        }
        $info['password'] = password_hash($data['password'],PASSWORD_DEFAULT);
        //修改密码
        $info->save();
        return true;
    }



}