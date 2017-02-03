<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class query_data extends Model
{
    public $timestamps = true;
    protected $table = 'query_data';
    protected $guarded = ['id'];
}
