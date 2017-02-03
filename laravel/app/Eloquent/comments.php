<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class comments extends Model
{
    public $timestamps = true;
    protected $table = 'comments';
    protected $guarded = ['id'];

    public function userInfo()
    {
        return $this->belongsTo('App\Eloquent\User', 'user_id');
    }
    public function reply()
    {
        return $this->hasOne('App\Eloquent\reply', 'post_id');
    }
}
