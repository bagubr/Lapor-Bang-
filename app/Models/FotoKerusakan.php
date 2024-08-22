<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FotoKerusakan extends Model
{
    use HasFactory;

    protected $table = 'foto_kerusakan';
    protected $fillable = [
        'foto', 'permohonan_id', 'tipe_foto'
    ];
    public $timestamps = false;
}
