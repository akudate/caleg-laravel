<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medsos extends Model
{
    protected $table = 'medsos';
    protected $primaryKey = 'id_medsos';
    protected $fillable = [
        "id_caleg",
        "type",
        "nama_medsos",
        "link_medsos",
    ];
}
