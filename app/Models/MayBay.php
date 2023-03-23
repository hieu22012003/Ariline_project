<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MayBay extends Model
{
    use HasFactory;
    protected $table="maybay";
    protected $primaryKey="id";
    protected $keyType="string";
    protected $fillable=[
      "tenmaybay",
      "soghe"
    ];
    public  function  scopeTenmaybay($query,$tenmaybay=''){
        if($tenmaybay != null && $tenmaybay != ''){
            return $query->where("tenmaybay","like","%".$tenmaybay."%");
        }
        return $query;
    }
}
