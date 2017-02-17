<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class NewsType extends Model
{
    /**
     * 关联到模型的数据表
     *
     * @var string
     */
    protected $table = 'news_type';

    protected $primaryKey = 'pk_id';
    protected $guarded = ['_token'];

    /**
     * 获取下级分类
     */
    public function childType()
    {
        return $this->hasMany('App\Model\NewsType','parent_id','pk_id');
    }
    /**
     * 获取上级分类
     */
    public function parentType()
    {
        return $this->belongsTo('App\Model\NewsType','parent_id','pk_id');
    }
}
