<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Poliklinik extends Model
{
    protected $guarded = ['id'];

    public function rumahSakit(){
        return $this->belongsTo(RumahSakit::class);
    }
}
