<?php

namespace Database\Seeders;

use App\Models\Bangunan;
use App\Models\Dokument;
use App\Models\FotoKerusakan;
use App\Models\Pejabat;
use App\Models\Permohonan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermohonanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permohonan::create([
            'bangunan_id' => 1,
            'pejabat_id' => 1,
            'tanggal_permohonan' => date('Y-m-d'),
            'status' => 'Pending',
            'deskripsi_singkat' => 'Example',
            'status_tanah' => 'Example', 
            'nomor_sertifikat' => 'Example', 
            'nama_sertifikat' => 'Example', 
            'kode_kib' => 'Example',
        ]);
        Pejabat::create([
            'user_id' => 1,
            'nama_pejabat' => 'Example',
            'telp' => 'Example',
            'address' => 'Example',
            'jabatan' => 'Example',
            'sk_jabatan' => 'Example',
            'nip' => 'Example',
            'tipe_pejabat' => 'BADAN RISET DAN INOVASI DAERAH',
        ]);
        Bangunan::create([
            'nama_bangunan' => 'Example',
            'user_id' => 1,
            'kecamatan' => 'Gayamsari',
            'kelurahan' => 'Gayamsari',
            'lokasi' => 'Example',
            'latitude' => '-6.99155435231046',
            'longitude' => '110.42349815368654',
        ]);
        Dokument::create([
            'permohonan_id' => 1, 
            'tipe_dokument' => 'ktp', 
            'file' => 'files/1IYUdWYqEzeX4iTvklFlJX5VS4cfWzGWE4UuCGP9.pdf', 
            'tanggal_upload' => date('Y-m-d'),
        ]);
        Dokument::create([
            'permohonan_id' => 1, 
            'tipe_dokument' => 'krk', 
            'file' => 'files/3gVjR4xDLAUNfnhML3wXbbBnhO07Rtb2t0keDrX2.pdf', 
            'tanggal_upload' => date('Y-m-d'),
        ]);
        Dokument::create([
            'permohonan_id' => 1, 
            'tipe_dokument' => 'surat_pernyataan', 
            'file' => 'files/3zR1tgGbxYU93IwBuvMuu7FlNn1IAFO9nlc936nJ.pdf', 
            'tanggal_upload' => date('Y-m-d'),
        ]);
        Dokument::create([
            'permohonan_id' => 1, 
            'tipe_dokument' => 'sertifikat', 
            'file' => 'files/3XUqQRC2mLqPRgZZoJRYmrEOc4LGgYOV73GtTMHC.pdf', 
            'tanggal_upload' => date('Y-m-d'),
        ]);
        FotoKerusakan::create([
            'foto' => 'foto/1YeCYXB9zQM2jFMiX1OnCNXqyjUMUpZQX8BkN39U.png', 
            'permohonan_id' => 1,
        ]);
        FotoKerusakan::create([
            'foto' => 'foto/cxDJ3Cm1RS9VkCi2BkIJRnpj2KyK79Wm5xUVy5Ci.jpg', 
            'permohonan_id' => 1,
        ]);
        FotoKerusakan::create([
            'foto' => 'foto/CXK47MCUGppOVsShb05a1L77D9UhvCPePD8Y5FRi.jpg', 
            'permohonan_id' => 1,
        ]);
    }
}
