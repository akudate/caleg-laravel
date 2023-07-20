<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    protected $table = 'agenda';
    protected $primaryKey = 'id';
    protected $fillable = [
        "tanggal",
        "jam",
        "agenda",
        "lokasi",
    ];
}
