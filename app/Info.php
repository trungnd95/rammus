<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    protected $table = 'infos';
    protected $fillable = ['id', 'about', 'contact', 'page'];
    public $timestamps = false;
}
