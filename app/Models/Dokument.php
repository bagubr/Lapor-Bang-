<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Dokument extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'dokument';
    protected $primaryKey = 'dokument_id';
    protected $fillable = [ 
        'permohonan_id', 'tipe_dokument', 'file', 'tanggal_upload',
    ];

    public function permohonan() : BelongsTo {
        return $this->belongsTo(Permohonan::class, 'permohonan_id', 'permohonan_id');
    }
}
