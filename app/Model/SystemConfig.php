<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SystemConfig extends Model
{
    /**
     * 关联到模型的数据表
     *
     * @var string
     */
    protected $table = 'system_config';

    protected $primaryKey = 'pk_id';
    protected $guarded = ['_token'];
}
