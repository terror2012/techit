<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Remote_Connect extends Model
{
    public $timestamps = true;
    protected $table = 'remote';
    protected $guarded = ['id'];
}
