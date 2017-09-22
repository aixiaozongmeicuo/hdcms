<?php namespace system\model;
use houdunwang\model\Model;
class Category extends Model{
	//数据表
	protected $table = "category";

	//允许填充字段
	protected $allowFill = [ '*'];

	//禁止填充字段
	protected $denyFill = [ ];

	//自动验证
	protected $validate=[
		//['字段名','验证方法','提示信息',验证条件,验证时间]
        ['cname','required','分类名必须要填写',self::MUST_VALIDATE ,self::MODEL_BOTH],
        ['orderby','/^\d+$/','排序必须为数字',self::MUST_VALIDATE ,self::MODEL_BOTH],
        ['orderby','required','排序必须要填写',self::MUST_VALIDATE ,self::MODEL_BOTH],
	];

	//自动完成
	protected $auto=[
		//['字段名','处理方法','方法类型',验证条件,验证时机]
	];

	//自动过滤
    protected $filter=[
        //[表单字段名,过滤条件,处理时间]
    ];

	//时间操作,需要表中存在created_at,updated_at字段
	protected $timestamps=true;


	//获得所有数据,并增强
    public static function getCategory(){
        //获得所有数据
        if (self::get()){
            $data = self::get()->toArray();
            return Arr::tree($data, 'cname', $fieldPri = 'cid', $fieldPid = 'pid');
        }

    }


    //
    public static function getCategoryById($model){
        //获得所有信息
        $data = self::getCategory();
        if ($data){
            foreach ($data as $k=>$v){
                $data[$k]['_disabled'] = $model['cid'] == $v['cid'] ? "disabled='disabled'" : '';
                //判断$data中循环出来的每一条数据是否为当前操作数据的子集,如果是,也加上disabled
                if (Arr::isChild($data, $v['cid'], $model['cid'], 'cid', 'pid')) {
                    $data[$k]['_disabled'] = "disabled='disabled'";
                }
            }
            return $data;
        }

    }

    //删除数据
    public  function delete($id){
        $data = self::getCategory();
        $model = $this->find($id);
        if (Arr::hasChild($data, $id, $fieldPid = 'pid')){
            $this->setError(['请先删除当前分类的子集']);
            return false;
        }
        //如果没有子集,执行删除
        return $model->destory();
    }


}