<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    /**
     * 关联到模型的数据表
     *
     * @var string
     */
    protected $table = 'feedback';

    protected $primaryKey = 'pk_id';
    //protected $fillable = ['user_id', 'identity', ];批量赋值的白名单
    protected $guarded = [];//黑名单
}

