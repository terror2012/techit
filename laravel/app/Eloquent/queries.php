<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class queries extends Model
{
    public $timestamps = true;
    protected $table = 'queries';
    protected $guarded = ['id'];
}
