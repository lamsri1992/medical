<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class medicalStore extends Model
{
    protected $table = 'medical_store';
    protected $fillable = [
        'store_med_code','store_lot_no'
    ];
    public $timestamps = false;
}
