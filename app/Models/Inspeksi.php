<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Inspeksi extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'inspeksi';

    protected $primaryKey = 'inspeksi_id';

    protected $fillable = [
        'permohonan_id','inspektor_id','tanggal_inspeksi','catatan_inspeksi',
    ];

    public function permohonan() : BelongsTo {
        return $this->belongsTo(Permohonan::class, 'permohonan_id', 'permohonan_id');
    }

    public function inspektor() : BelongsTo {
        return $this->belongsTo(User::class, 'inspektor_id', 'id');
    }
}
