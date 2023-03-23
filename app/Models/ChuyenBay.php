<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChuyenBay extends Model
{
    use HasFactory;
    protected $table="chuyenbay";
    protected $primaryKey="id";
    protected $keyType="string";
    protected $fillable=[
        "idmaybay",
        "sanbaydi",
        "sanbayden",
        "tgiankhoihanh",
        "tgiandendukien",
        "quangduong"
    ];
    function scopeSanbaydi($query,$sanbaydi=''){
        if($sanbaydi != null && $sanbaydi!=''){
            return $query->where("sanbaydi", $sanbaydi);
        }
        return $query;
    }
    public  function scopeSanbayden($query,$sanbayden=''){
        if($sanbayden != null && $sanbayden!=''){
            return $query->where("sanbayden", $sanbayden);
        }
        return $query;
    }
    public  function scopetgiankhoihanh($query,$tgiankhoihanh=''){
        if($tgiankhoihanh != null && $tgiankhoihanh!=''){
            return $query->where("tgiankhoihanh","like","%".$tgiankhoihanh."%");
        }
        return $query;
    }
    public  function scopetgiandendukien($query,$tgiandendukien=''){
        if($tgiandendukien != null && $tgiandendukien!=''){
            return $query->where("tgiandendukien","like","%".$tgiandendukien."%");
        }
        return $query;
    }

}
