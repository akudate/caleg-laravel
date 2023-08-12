<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Relawan extends Model
{
    protected $table = 'relawan';
    protected $primaryKey = 'id_relawan';
    protected $fillable = [
        "nik",
        "nama_relawan",
        "jk",
        "jabatan",
        "upline",
        "id_desa",
        "saksi",
        "profile",
        "id_caleg",
        "status",
        "no_hp",
        "email",
        "username",
        "password",
        "loyalis",
        "blokir",
        "tps",
        "referal",
    ];
    public function partai()
    {
        return $this->belongsTo(Setting::class, 'id_partai');
    }
}
