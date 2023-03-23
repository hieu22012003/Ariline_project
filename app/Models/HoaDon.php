<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HoaDon extends Model
{
    use HasFactory;
    protected $table="hoadon";
    protected $primaryKey="id";
    protected $keyType="string";
    protected $fillable=[
        "idkh",
        "mave",
        "ngaylaphoadon",
        "tongtiem"
    ];
    public  function  scopeID($query,$ID=''){
        if($ID != null && $ID != ''){
            return $query->where("idkh","like","%".$ID."%");
        }
        return $query;
    }

    public function khachhang(){
        return $this->belongsTo(KhachHang::class,'idkh','sdt');
    }
}
