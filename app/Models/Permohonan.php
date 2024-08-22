<?php

namespace App\Models;

use App\Models\Scopes\PermohonanScope;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

#[ScopedBy([PermohonanScope::class])]

class Permohonan extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'permohonan';

    protected $primaryKey = 'permohonan_id';

    protected $fillable = [
        'bangunan_id','pejabat_id','tanggal_permohonan','status','deskripsi_singkat', 'tanggal_penolakan', 'tanggal_terima', 'klasifikasi', 'status_tanah', 'nomor_sertifikat', 'nama_sertifikat', 'kode_kib'
    ];

    public function bangunan() : BelongsTo {
        return $this->belongsTo(Bangunan::class, 'bangunan_id', 'bangunan_id');
    }

    public function pejabat() : BelongsTo {
        return $this->belongsTo(Pejabat::class, 'pejabat_id', 'pejabat_id');
    }

    function foto_kerusakan() : HasMany {
        return $this->hasMany(FotoKerusakan::class, 'permohonan_id', 'permohonan_id');
    }

    public function dokument_pertipe($tipe_dokument) : Dokument {
        return $this->hasMany(Dokument::class, 'permohonan_id', 'permohonan_id')->where('tipe_dokument', $tipe_dokument)->first();
    }

    public function dokument() : HasMany {
        return $this->hasMany(Dokument::class, 'permohonan_id', 'permohonan_id');
    }

    public function logs() : HasMany {
        return $this->hasMany(Logs::class, 'permohonan_id', 'permohonan_id');
    }

    public function inspeksi() : HasOne {
        return $this->hasOne(Inspeksi::class, 'permohonan_id', 'permohonan_id');
    }

    protected $attributes = [
        'status' => 'Pending',
    ];
}
