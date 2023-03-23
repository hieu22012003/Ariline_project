<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhachHang extends Model
{
use HasFactory;
 protected $table = 'khachhang';
 protected $primaryKey= 'id';
 protected $keyType='string';
 protected $fillable=[
     "name",
     "email",
     "sove",
     "sdt",
     "address",
     "cmnd",
     "birth",
     "gender"
 ];

}
