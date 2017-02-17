<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductInfo extends Model
{
    /**
     * 关联到模型的数据表
     *
     * @var string
     */
    protected $table = 'product_info';

    protected $primaryKey = 'pk_id';
    protected $guarded = ['_token'];

    /**
     *
     * 获取对应的产品类型
     **/
    public function type()
    {
        return $this->belongsTo('App\Model\ProductType','type_id','pk_id');
    }
}