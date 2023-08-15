<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $table = 'news';
    protected $primaryKey = 'id_news';
    protected $fillable = [
        "judul",
        "isi_berita",
        "tgl_publish",
        "id_caleg",
        "gambar",
        "aktif"
    ];
}
