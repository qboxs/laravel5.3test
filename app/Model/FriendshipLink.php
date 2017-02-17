<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class FriendshipLink extends Model
{
    /**
     * 关联到模型的数据表
     *
     * @var string
     */
    protected $table = 'friendship_link';

    protected $primaryKey = 'pk_id';
    protected $guarded = ['_token'];

}
