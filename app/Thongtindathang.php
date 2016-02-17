<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thongtindathang extends Model
{
	protected $table = 'thongtindathangs';
    protected $fillable = ['id', 'email', 'hovatendem', 'ten', 'diachi', 'dienthoai', 'thongtindonhang', 'tinhtrang', 'created_at'];
    public $timestamps = true;
}
