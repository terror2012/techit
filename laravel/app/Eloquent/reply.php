<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class reply extends Model
{
    public $timestamps = true;
    protected $table = 'replies';
    protected $guarded = ['id'];


    function user()
    {
        return $this->belongsTo('App\Eloquent\User', 'user_id');
    }
}
