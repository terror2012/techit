<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class user_info extends Model
{
    public $timestamps = false;
    protected $table = 'user_info';
    protected $guarded = ['id'];

}
