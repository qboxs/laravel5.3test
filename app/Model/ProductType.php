<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    /**
     * 关联到模型的数据表
     *
     * @var string
     */
    protected $table = 'product_type';

    protected $primaryKey = 'pk_id';
    protected $guarded = ['_token'];

    /**
     * 获取类型产品
     */
    public function productInfo()
    {
        return $this->hasMany('App\Model\ProductInfo','pk_id','type_id');
    }
}
