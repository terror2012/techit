<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class about_us extends Model
{
    public $timestamps = true;
    protected $table = 'about_us';
    protected $guarded = ['id'];
}
