<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class WebDomainConfig extends Model
{
    /**
     * 关联到模型的数据表
     *
     * @var string
     */
    protected $table = 'web_domain_config';

    protected $primaryKey = 'pk_id';
    protected $guarded = ['_token'];
}
