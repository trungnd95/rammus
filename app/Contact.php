<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contacts';
    protected $fillable = ['id', 'your_name', 'email', 'content', 'seen', 'answer'];
    public $timestamps = true;
}
