<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class service_sections extends Model
{
    public $timestamps = false;
    protected $table = 'section';
    protected $guarded = ['id'];
}
