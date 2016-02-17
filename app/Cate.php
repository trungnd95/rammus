<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cate extends Model
{
    protected $table = 'cates';
    protected $fillable = ['id', 'name', 'slug', 'icon', 'image', 'order', 'description', 'parent_id'];
    public $timestamps = false;
    
    public function product () {
    	return $this->hasMany('App\Product');
    }
}
