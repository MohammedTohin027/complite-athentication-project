<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function division(){
        return $this->belongsTo('App\Models\Ship_Division');
    }
    public function district(){
        return $this->belongsTo('App\Models\District');
    }
}