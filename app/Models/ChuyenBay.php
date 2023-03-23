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
}
