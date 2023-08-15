<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dukungan extends Model
{
    protected $table = 'dukungan';
    protected $primaryKey = 'id_dukungan';
    protected $fillable = [
        "pesan",
        "nama",
        "email",
        "id_caleg",
    ];
}
