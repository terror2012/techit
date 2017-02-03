<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class general_settings extends Model
{
    public $timestamps = false;
    protected $table = 'general_settings';
    protected $guarded = ['id'];
}
