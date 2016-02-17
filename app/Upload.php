<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
	protected $table = 'uploads';
    protected $fillable = ['id', 'name', 'type', 'size', 'url', 'title', 'caption', 'availability', 'alt_text', 'description', 'user_id', 'created_at', 'updated_at'];
    public $timestamps = true;

    public function user () {
    	return $this->belongsTo('App\User');
    }
}
