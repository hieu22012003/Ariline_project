<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ve extends Model
{
    use HasFactory;
    protected $table = 've';
    protected $primaryKey= 'id';
    protected $keyType='string';
    protected $fillable=[
        "tennguoidi",
        "idchuyenbay",
        "ngaydatve",
        "trangthai",
        "gia",
        "loaive",
        "vitringoi"
    ];
    public function sanbay1(){
        return $this->belongsTo(SanBay::class,"sanbaydi","idsanbay");
    }

    public function sanbay2(){
        return $this->belongsTo(SanBay::class,"sanbayden","idsanbay");
    }
    public function chuyenbay(){
        return $this->belongsTo(ChuyenBay::class,"idchuyenbay","idchuyenbay");
    }
}
