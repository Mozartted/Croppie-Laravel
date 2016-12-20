<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table='picbase';
    protected $fillable=['id','url'];
    public $timestamps=false;
}
