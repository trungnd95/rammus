<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = ['id', 'name', 'slug', 'price', 'color', 'size', 'availability', 'info', 'image', 'cate_id'];
    public $timestamps = true;
    
    public function cate () {
    	return $this->belongsTo('App\Cate');
    }

    public function user () {
    	return $this->belongsTo('App\User');
    }
}
