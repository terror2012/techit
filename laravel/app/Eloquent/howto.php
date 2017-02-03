<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class howto extends Model
{
    public $timestamps = false;
    protected $table = 'how_to';
    protected $guarded = ['id'];
}
