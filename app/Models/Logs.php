<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Logs extends Model
{
    use HasFactory;

    protected $table = 'logs';
    protected $fillable = [
        'catatan', 'user_id', 'to_user_id', 'permohonan_id', 'status'
    ];

    public function user() : BelongsTo {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function to_user() : BelongsTo {
        return $this->belongsTo(User::class, 'to_user_id', 'id');
    }
}
