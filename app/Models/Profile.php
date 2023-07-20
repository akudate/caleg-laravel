<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profile';
    protected $primaryKey = 'id';
    protected $fillable = [
        "nama",
        "title",
        "alamat_kantor",
        "kontak",
        "biografi",
        "image ",
    ];
}
