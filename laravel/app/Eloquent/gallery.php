<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class gallery extends Model
{
    public $timestamps = false;
    protected $table = 'sliders';
    protected $guarded = ['id'];
}
