<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
	protected $table = 'blogs';
    protected $fillable = ['id', 'title', 'slug', 'image','content', 'description','user_id', 'status', 'created_at'];
    public $timestamps = true;
    
    public function user () {
    	return $this->belongsTo('App\User');
    }
}
