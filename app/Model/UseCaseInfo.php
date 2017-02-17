<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UseCaseInfo extends Model
{
    /**
     * 关联到模型的数据表
     *
     * @var string
     */
    protected $table = 'use_case_info';

    protected $primaryKey = 'pk_id';
    protected $guarded = ['_token'];
}
