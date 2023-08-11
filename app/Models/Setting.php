<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $table = 'partai';
    protected $primaryKey = 'id_partai';
    protected $fillable = [
        "nama_partai",
        "nama_pendek",
        "warna",
        "secondary_color",
        "text_color",
        "front1",
        "front2",
        "logo",
    ];
}
