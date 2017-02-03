<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class invoices extends Model
{
    public $timestamps = false;
    protected $table = 'invoices';
    protected $guarded = ['id'];
}
