<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class service_list extends Model
{
    public $timestamps = false;
    protected $table = 'services';
    protected $guarded = ['id'];
}
