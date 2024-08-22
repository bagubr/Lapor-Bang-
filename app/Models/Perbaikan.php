<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Perbaikan extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'perbaikan';

    protected $primaryKey = 'perbaikan_id';

    protected $fillable = [
        'permohonan_id', 'kontraktor_id', 'tanggal_mulai', 'tanggal_selesai', 'biaya', 'status',
    ];

    public function permohonan() : BelongsTo {
        return $this->belongsTo(Permohonan::class, 'permohonan_id', 'permohonan_id');
    }

    public function inspektor() : BelongsTo {
        return $this->belongsTo(User::class, 'kontraktor_id', 'user_id');
    }
}
