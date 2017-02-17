<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class NewsComments extends Model
{
    /**
     * 关联到模型的数据表
     *
     * @var string
     */
    protected $table = 'news_comments';

    protected $primaryKey = 'pk_id';
}
