<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class how_section extends Model
{
    public $timestamps = true;
    protected $table = 'how_to_section';
    protected $guarded = ['id'];
}
