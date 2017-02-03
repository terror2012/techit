<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class service_list extends Model
{
    public $timestamps = false;
    protected $table = 'services';
    protected $guarded = ['id'];

    public function section()
    {
        return $this->hasOne('App\Eloquent\service_sections', 'section_id');
    }
}
