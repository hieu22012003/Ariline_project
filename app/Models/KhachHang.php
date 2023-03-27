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
    public  function  scopeName($query,$Name=''){
        if($Name != null && $Name != ''){
            return $query->where("name","like","%".$Name."%");
        }
        return $query;
    }
    public function sanbay1(){
        return $this->belongsTo(SanBay::class,"sanbaydi","idsanbay");
    }
    public function sanbay2(){
        return $this->belongsTo(SanBay::class,"sanbayden","idsanbay");
    }
    public function sanbaydi(){
        return $this->belongsTo(SanBay::class,"sanbaydi","idsanbay");
    }
}
