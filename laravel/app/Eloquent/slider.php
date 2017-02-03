<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class slider extends Model
{
    public $timestamps = true;
    protected $table = 'sliders';
    protected $guarded = ['id'];
}
