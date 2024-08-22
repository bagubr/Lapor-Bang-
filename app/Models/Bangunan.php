<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Bangunan extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'bangunan';

    protected $primaryKey = 'bangunan_id';

    protected $fillable = [ 
        'nama_bangunan', 'user_id', 'kecamatan', 'kelurahan', 'lokasi', 'latitude', 'longitude'
    ];

    public function user() : BelongsTo {
        return $this->belongsTo(User::class, 'user_id');
    }
}
