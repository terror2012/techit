<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class inv_history extends Model
{
    public $timestamps = false;
    protected $table = 'invoice_history';
    protected $guarded = ['id'];
}
