<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CooperativeAdver extends Model
{
    /**
 * 关联到模型的数据表
 *
 * @var string
 */
    protected $table = 'cooperative_adver';

    protected $primaryKey = 'pk_id';
    protected $guarded = ['_token'];
}
