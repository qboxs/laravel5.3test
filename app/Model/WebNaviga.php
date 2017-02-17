<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class WebNaviga extends Model
{
    /**
     * 关联到模型的数据表
     *
     * @var string
     */
    protected $table = 'web_naviga';

    protected $primaryKey = 'pk_id';
    protected $guarded = ['_token'];
}
