<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class payment_history extends Model
{
    public $timestamps = true;
    protected $table = 'payment_history';
    protected $guarded = ['id'];
}
