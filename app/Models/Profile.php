<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'caleg';
    protected $primaryKey = 'id_caleg';
    protected $fillable = [
        "demo",
        "dapil",
        "nama_caleg",
        "nama_lengkap",
        "id_legislatif",
        "id_provinsi",
        "id_kabupaten",
        "harapan_suara",
        "downline",
        "level",
        "almaat",
        "no_hp",
        "email",
        "id_partai",
        "aktif",
        "username",
        "password",
        "foto",
    ];
    public function partai()
    {
        return $this->belongsTo(Setting::class, 'id_partai');
    }
}
