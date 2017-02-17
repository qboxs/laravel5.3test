<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SinglePageInfo extends Model
{
    /**
     * 关联到模型的数据表
     *
     * @var string
     */
    protected $table = 'single_page_info';

    protected $primaryKey = 'pk_id';
    protected $guarded = ['_token'];
}
