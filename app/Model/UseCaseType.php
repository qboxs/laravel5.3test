<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UseCaseType extends Model
{
    /**
     * 关联到模型的数据表
     *
     * @var string
     */
    protected $table = 'use_case_type';

    protected $primaryKey = 'pk_id';
    protected $guarded = ['_token'];
}
