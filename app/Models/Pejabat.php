<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pejabat extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'pejabat';
    
    protected $primaryKey = 'pejabat_id';

    protected $fillable = [
        'user_id', 'nama_pejabat', 'telp', 'address', 'jabatan', 'sk_jabatan', 'nip', 'tipe_pejabat',
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
}
