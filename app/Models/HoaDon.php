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
        "ngaylaphoadon",
        "tongtiem"
    ];
}
