<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanBay extends Model
{
    use HasFactory;
    protected $table="sanbay";
    protected $primaryKey="id";
    protected $keyType="string";
    protected $fillable=[
        "tensanbay",
        "tenthanhpho"
    ];
}
