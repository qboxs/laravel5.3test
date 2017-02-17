<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class NewsInfo extends Model
{
    /**
     * 关联到模型的数据表
     *
     * @var string
     */
    protected $table = 'news_info';

    protected $primaryKey = 'pk_id';
    protected $guarded = ['_token'];
}
