<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GiaVe extends Model
{
    use HasFactory;
    protected $table="giave";
    protected $primaryKey="id";
    protected $keyType="string";
    protected $fillable=[
        "idchuyenbay",
        "gia",
        "loaive"
    ];
}
