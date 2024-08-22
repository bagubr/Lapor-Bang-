@extends('adminlte::page')

@section('title', 'Edit Permohonan')

@section('content_header')
<h1>Edit Permohonan</h1>
@stop

@section('content')
<div>
    <form action="{{route('permohonan.update', $permohonan->permohonan_id)}}" method="POST" enctype="multipart/form-data" id="form">
        @method('PUT')
        @csrf
        <x-adminlte-card title="Data Pejabat" theme="secondary" theme-mode="outline" class="elevation-3" body-class="bg-light" header-class="bg-light" footer-class="bg-secondary border-top rounded border-light" icon="fas fa-lg fa-user" id="card-pejabat">
            <x-adminlte-input label="Nama *" id="nama_pejabat" name="nama_pejabat" type="text" placeholder="Nama" value="{{$permohonan->pejabat->nama_pejabat}}" required/>
            <x-adminlte-textarea name="address" placeholder="Alamat" label="Alamat *" required>{{$permohonan->pejabat->address}}</x-adminlte-textarea>
            <x-adminlte-input label="Jabatan *" id="jabatan" name="jabatan" type="text" placeholder="Ketua" value="{{$permohonan->pejabat->jabatan}}" required />
            <x-adminlte-input label="NIP *" id="nip" name="nip" type="text" placeholder="NIP" value="{{$permohonan->pejabat->nip}}"  required/>
            <x-adminlte-input label="Telp *" id="telp" name="telp" type="text" placeholder="Telp" value="{{$permohonan->pejabat->telp}}" required/>
            <x-adminlte-input label="SK Pejabat *" name="sk_jabatan" type="text" placeholder="SK" value="{{$permohonan->pejabat->sk_jabatan}}" required/>
            <label for="">DINAS/OPD *</label>
            <select name="tipe_pejabat" class="select2 form-control" required>
                <option value="">Pilih OPD</option>
                <option {{($permohonan->pejabat->tipe_pejabat == 'BADAN RISET DAN INOVASI DAERAH')?'selected':''}} value="BADAN RISET DAN INOVASI DAERAH">BADAN RISET DAN INOVASI DAERAH</option>
                <option {{($permohonan->pejabat->tipe_pejabat == 'SEKRETARIAT DPRD')?'selected':''}} value="SEKRETARIAT DPRD">SEKRETARIAT DPRD</option>
                <option {{($permohonan->pejabat->tipe_pejabat == 'SEKRETARIAT DAERAH')?'selected':''}} value="SEKRETARIAT DAERAH">SEKRETARIAT DAERAH</option>
                <option {{($permohonan->pejabat->tipe_pejabat == 'SATUAN POLISI PAMONG PRAJA')?'selected':''}} value="SATUAN POLISI PAMONG PRAJA">SATUAN POLISI PAMONG PRAJA</option>
                <option {{($permohonan->pejabat->tipe_pejabat == 'RUMAH SAKIT UMUM DAERAH K.R.M.T WONGSONEGORO')?'selected':''}} value="RUMAH SAKIT UMUM DAERAH K.R.M.T WONGSONEGORO">RUMAH SAKIT UMUM DAERAH K.R.M.T WONGSONEGORO</option>
                <option {{($permohonan->pejabat->tipe_pejabat == 'KECAMATAN TUGU')?'selected':''}} value="KECAMATAN TUGU">KECAMATAN TUGU</option>
                <option {{($permohonan->pejabat->tipe_pejabat == 'KECAMATAN TEMBALANG')?'selected':''}} value="KECAMATAN TEMBALANG">KECAMATAN TEMBALANG</option>
                <option {{($permohonan->pejabat->tipe_pejabat == 'KECAMATAN SEMARANG UTARA')?'selected':''}} value="KECAMATAN SEMARANG UTARA">KECAMATAN SEMARANG UTARA</option>
                <option {{($permohonan->pejabat->tipe_pejabat == 'KECAMATAN SEMARANG TIMUR')?'selected':''}} value="KECAMATAN SEMARANG TIMUR">KECAMATAN SEMARANG TIMUR</option>
                <option {{($permohonan->pejabat->tipe_pejabat == 'KECAMATAN SEMARANG TENGAH')?'selected':''}} value="KECAMATAN SEMARANG TENGAH">KECAMATAN SEMARANG TENGAH</option>
                <option {{($permohonan->pejabat->tipe_pejabat == 'KECAMATAN SEMARANG SELATAN')?'selected':''}} value="KECAMATAN SEMARANG SELATAN">KECAMATAN SEMARANG SELATAN</option>
                <option {{($permohonan->pejabat->tipe_pejabat == 'KECAMATAN SEMARANG BARAT')?'selected':''}} value="KECAMATAN SEMARANG BARAT">KECAMATAN SEMARANG BARAT</option>
                <option {{($permohonan->pejabat->tipe_pejabat == 'KECAMATAN PEDURUNGAN')?'selected':''}} value="KECAMATAN PEDURUNGAN">KECAMATAN PEDURUNGAN</option>
                <option {{($permohonan->pejabat->tipe_pejabat == 'KECAMATAN NGALIYAN')?'selected':''}} value="KECAMATAN NGALIYAN">KECAMATAN NGALIYAN</option>
                <option {{($permohonan->pejabat->tipe_pejabat == 'KECAMATAN MIJEN')?'selected':''}} value="KECAMATAN MIJEN">KECAMATAN MIJEN</option>
                <option {{($permohonan->pejabat->tipe_pejabat == 'KECAMATAN GUNUNGPATI')?'selected':''}} value="KECAMATAN GUNUNGPATI">KECAMATAN GUNUNGPATI</option>
                <option {{($permohonan->pejabat->tipe_pejabat == 'KECAMATAN GENUK')?'selected':''}} value="KECAMATAN GENUK">KECAMATAN GENUK</option>
                <option {{($permohonan->pejabat->tipe_pejabat == 'KECAMATAN GAYAMSARI')?'selected':''}} value="KECAMATAN GAYAMSARI">KECAMATAN GAYAMSARI</option>
                <option {{($permohonan->pejabat->tipe_pejabat == 'KECAMATAN GAJAHMUNGKUR')?'selected':''}} value="KECAMATAN GAJAHMUNGKUR">KECAMATAN GAJAHMUNGKUR</option>
                <option {{($permohonan->pejabat->tipe_pejabat == 'KECAMATAN CANDISARI')?'selected':''}} value="KECAMATAN CANDISARI">KECAMATAN CANDISARI</option>
                <option {{($permohonan->pejabat->tipe_pejabat == 'KECAMATAN BANYUMANIK')?'selected':''}} value="KECAMATAN BANYUMANIK">KECAMATAN BANYUMANIK</option>
                <option {{($permohonan->pejabat->tipe_pejabat == 'INSPEKTORAT')?'selected':''}} value="INSPEKTORAT">INSPEKTORAT</option>
                <option {{($permohonan->pejabat->tipe_pejabat == 'DINAS TENAGA KERJA')?'selected':''}} value="DINAS TENAGA KERJA">DINAS TENAGA KERJA</option>
                <option {{($permohonan->pejabat->tipe_pejabat == 'DINAS SOSIAL')?'selected':''}} value="DINAS SOSIAL">DINAS SOSIAL</option>
                <option {{($permohonan->pejabat->tipe_pejabat == 'DINAS PERUMAHAN DAN KAWASAN PERMUKIMAN')?'selected':''}} value="DINAS PERUMAHAN DAN KAWASAN PERMUKIMAN">DINAS PERUMAHAN DAN KAWASAN PERMUKIMAN</option>
                <option {{($permohonan->pejabat->tipe_pejabat == 'DINAS PERTANIAN')?'selected':''}} value="DINAS PERTANIAN">DINAS PERTANIAN</option>
                <option {{($permohonan->pejabat->tipe_pejabat == 'DINAS PERINDUSTRIAN')?'selected':''}} value="DINAS PERINDUSTRIAN">DINAS PERINDUSTRIAN</option>
                <option {{($permohonan->pejabat->tipe_pejabat == 'DINAS PERIKANAN')?'selected':''}} value="DINAS PERIKANAN">DINAS PERIKANAN</option>
                <option {{($permohonan->pejabat->tipe_pejabat == 'DINAS PERHUBUNGAN')?'selected':''}} value="DINAS PERHUBUNGAN">DINAS PERHUBUNGAN</option>
                <option {{($permohonan->pejabat->tipe_pejabat == 'DINAS PERDAGANGAN')?'selected':''}} value="DINAS PERDAGANGAN">DINAS PERDAGANGAN</option>
                <option {{($permohonan->pejabat->tipe_pejabat == 'DINAS PENGENDALIAN PENDUDUK DAN KELUARGA BERENCANA')?'selected':''}} value="DINAS PENGENDALIAN PENDUDUK DAN KELUARGA BERENCANA">DINAS PENGENDALIAN PENDUDUK DAN KELUARGA BERENCANA</option>
                <option {{($permohonan->pejabat->tipe_pejabat == 'DINAS PENDIDIKAN')?'selected':''}} value="DINAS PENDIDIKAN">DINAS PENDIDIKAN</option>
                <option {{($permohonan->pejabat->tipe_pejabat == 'DINAS PENATAAN RUANG')?'selected':''}} value="DINAS PENATAAN RUANG">DINAS PENATAAN RUANG</option>
                <option {{($permohonan->pejabat->tipe_pejabat == 'DINAS PENANAMAN MODAL DAN PELAYANAN TERPADU SATU PINTU')?'selected':''}} value="DINAS PENANAMAN MODAL DAN PELAYANAN TERPADU SATU PINTU">DINAS PENANAMAN MODAL DAN PELAYANAN TERPADU SATU PINTU</option>
                <option {{($permohonan->pejabat->tipe_pejabat == 'DINAS PEMBERDAYAAN PEREMPUAN DAN PERLINDUNGAN ANAK')?'selected':''}} value="DINAS PEMBERDAYAAN PEREMPUAN DAN PERLINDUNGAN ANAK">DINAS PEMBERDAYAAN PEREMPUAN DAN PERLINDUNGAN ANAK</option>
                <option {{($permohonan->pejabat->tipe_pejabat == 'DINAS PEMADAM KEBAKARAN')?'selected':''}} value="DINAS PEMADAM KEBAKARAN">DINAS PEMADAM KEBAKARAN</option>
                <option {{($permohonan->pejabat->tipe_pejabat == 'DINAS PEKERJAAN UMUM')?'selected':''}} value="DINAS PEKERJAAN UMUM">DINAS PEKERJAAN UMUM</option>
                <option {{($permohonan->pejabat->tipe_pejabat == 'DINAS LINGKUNGAN HIDUP')?'selected':''}} value="DINAS LINGKUNGAN HIDUP">DINAS LINGKUNGAN HIDUP</option>
                <option {{($permohonan->pejabat->tipe_pejabat == 'DINAS KOPERASI DAN USAHA MIKRO')?'selected':''}} value="DINAS KOPERASI DAN USAHA MIKRO">DINAS KOPERASI DAN USAHA MIKRO</option>
                <option {{($permohonan->pejabat->tipe_pejabat == 'DINAS KOMUNIKASI, INFORMATIKA, STATISTIK DAN PERSANDIAN')?'selected':''}} value="DINAS KOMUNIKASI, INFORMATIKA, STATISTIK DAN PERSANDIAN">DINAS KOMUNIKASI, INFORMATIKA, STATISTIK DAN PERSANDIAN</option>
                <option {{($permohonan->pejabat->tipe_pejabat == 'DINAS KETAHANAN PANGAN')?'selected':''}} value="DINAS KETAHANAN PANGAN">DINAS KETAHANAN PANGAN</option>
                <option {{($permohonan->pejabat->tipe_pejabat == 'DINAS KESEHATAN')?'selected':''}} value="DINAS KESEHATAN">DINAS KESEHATAN</option>
                <option {{($permohonan->pejabat->tipe_pejabat == 'DINAS KEPENDUDUKAN DAN PENCATATAN SIPIL')?'selected':''}} value="DINAS KEPENDUDUKAN DAN PENCATATAN SIPIL">DINAS KEPENDUDUKAN DAN PENCATATAN SIPIL</option>
                <option {{($permohonan->pejabat->tipe_pejabat == 'DINAS KEPEMUDAAN DAN OLAHRAGA')?'selected':''}} value="DINAS KEPEMUDAAN DAN OLAHRAGA">DINAS KEPEMUDAAN DAN OLAHRAGA</option>
                <option {{($permohonan->pejabat->tipe_pejabat == 'DINAS KEBUDAYAAN DAN PARIWISATA')?'selected':''}} value="DINAS KEBUDAYAAN DAN PARIWISATA">DINAS KEBUDAYAAN DAN PARIWISATA</option>
                <option {{($permohonan->pejabat->tipe_pejabat == 'DINAS ARSIP DAN PERPUSTAKAAN')?'selected':''}} value="DINAS ARSIP DAN PERPUSTAKAAN">DINAS ARSIP DAN PERPUSTAKAAN</option>
                <option {{($permohonan->pejabat->tipe_pejabat == 'BADAN PERENCANAAN PEMBANGUNAN DAERAH')?'selected':''}} value="BADAN PERENCANAAN PEMBANGUNAN DAERAH">BADAN PERENCANAAN PEMBANGUNAN DAERAH</option>
                <option {{($permohonan->pejabat->tipe_pejabat == 'BADAN PENGELOLAAN KEUANGAN DAN ASET DAERAH')?'selected':''}} value="BADAN PENGELOLAAN KEUANGAN DAN ASET DAERAH">BADAN PENGELOLAAN KEUANGAN DAN ASET DAERAH</option>
                <option {{($permohonan->pejabat->tipe_pejabat == 'BADAN PENDAPATAN DAERAH')?'selected':''}} value="BADAN PENDAPATAN DAERAH">BADAN PENDAPATAN DAERAH</option>
                <option {{($permohonan->pejabat->tipe_pejabat == 'BADAN PENANGGULANGAN BENCANA DAERAH')?'selected':''}} value="BADAN PENANGGULANGAN BENCANA DAERAH">BADAN PENANGGULANGAN BENCANA DAERAH</option>
                <option {{($permohonan->pejabat->tipe_pejabat == 'BADAN KESATUAN BANGSA DAN POLITIK')?'selected':''}} value="BADAN KESATUAN BANGSA DAN POLITIK">BADAN KESATUAN BANGSA DAN POLITIK</option>
                <option {{($permohonan->pejabat->tipe_pejabat == 'BADAN KEPEGAWAIAN, PENDIDIKAN DAN PELATIHAN')?'selected':''}} value="BADAN KEPEGAWAIAN, PENDIDIKAN DAN PELATIHAN">BADAN KEPEGAWAIAN, PENDIDIKAN DAN PELATIHAN</option>
            </select>
        </x-adminlte-card>
        <x-adminlte-card title="Data Bangunan" theme="secondary" theme-mode="outline" class="elevation-3" body-class="bg-light" header-class="bg-light" footer-class="bg-secondary border-top rounded border-light" icon="fas fa-lg fa-building" id="card-bangunan">
            <x-adminlte-input label="Nama Bangunan *" id="nama_bangunan" name="nama_bangunan" type="text" placeholder="Nama Bangunan" value="{{$permohonan->bangunan->nama_bangunan}}" required />
            <x-adminlte-textarea name="lokasi" placeholder="Lokasi Bangunan" label="Lokasi Bangunan *" required>{{$permohonan->bangunan->lokasi}}</x-adminlte-textarea>
            <x-adminlte-select2 name="kecamatan" id="kecamatan" label="Kecamatan *" label-class="text-dark" igroup-size="lg" required>
                <option value="">Pilih Kecamatan</option>
                <option value="{{$permohonan->bangunan->kecamatan}}" selected>{{$permohonan->bangunan->kecamatan}}</option>
            </x-adminlte-select2>
            <x-adminlte-select2 name="kelurahan" id="kelurahan" label="Kelurahan *" label-class="text-dark" igroup-size="lg" required>
                <option value="">Pilih Kelurahan</option>
                <option value="{{$permohonan->bangunan->kelurahan}}" selected>{{$permohonan->bangunan->kelurahan}}</option>
            </x-adminlte-select2>
            <label for="">Koordinat *</label>
            <x-adminlte-input name="longitude" type="hidden" id="longitude" value="{{$permohonan->bangunan->longitude}}"  required/>
            <x-adminlte-input name="latitude" type="hidden" id="latitude" value="{{$permohonan->bangunan->latitude}}" required/>
            <div style="width:100%;height:400px; ">
                <div style="width: 100%; height: 100%" id="map"></div>
            </div>
        </x-adminlte-card>
        <x-adminlte-card title="Data Sertifikat" theme="secondary" theme-mode="outline" class="elevation-3" body-class="bg-light" header-class="bg-light" footer-class="bg-secondary border-top rounded border-light" icon="fas fa-lg fa-file" id="card-sertifikat">
            <x-adminlte-input label="Nama Sertifikat (Sesuaikan Sertifikat) *" name="nama_sertifikat" type="text" placeholder="Nama Sertifikat" required id="nama_sertifikat" value="{{$permohonan->nama_sertifikat}}"/>
            <x-adminlte-select name="status_tanah" id="status_tanah" label="Status Tanah *" label-class="text-dark" required>
                <option value="">--- Pilih Status Tanah ---</option>
                <option value="HAK MILIK" {{($permohonan->status_tanah == 'HAK MILIK')?'selected':''}}>HAK MILIK</option>
                <option value="HAK GUNA BANGUNAN" {{($permohonan->status_tanah == 'HAK GUNA BANGUNAN')?'selected':''}}>HAK GUNA BANGUNAN</option>
                <option value="HAK GUNA USAHA" {{($permohonan->status_tanah == 'HAK GUNA USAHA')?'selected':''}}>HAK GUNA USAHA</option>
                <option value="HAK PAKAI" {{($permohonan->status_tanah == 'HAK PAKAI')?'selected':''}}>HAK PAKAI</option>
                <option value="HAK PENGELOLAAN" {{($permohonan->status_tanah == 'HAK PENGELOLAAN')?'selected':''}}>HAK PENGELOLAAN</option>
                <option value="HAK SATUAN RUMAH SUSUN" {{($permohonan->status_tanah == 'HAK SATUAN RUMAH SUSUN')?'selected':''}}>HAK SATUAN RUMAH SUSUN</option>
                <option value="TANAH YASAN (LETTER C/D)" {{($permohonan->status_tanah == 'TANAH YASAN (LETTER C/D)')?'selected':''}}>TANAH YASAN (LETTER C/D)</option>
                <option value="TANAH NEGARA" {{($permohonan->status_tanah == 'TANAH NEGARA')?'selected':''}}>TANAH NEGARA</option>
                <option value="TANAH WAKAF" {{($permohonan->status_tanah == 'TANAH WAKAF')?'selected':''}}>TANAH WAKAF</option>

            </x-adminlte-select>
            <x-adminlte-input label="Nomor Sertifikat *" id="nomor_sertifikat" name="nomor_sertifikat" type="text" placeholder="Nomor Sertifikat" required value="{{$permohonan->nomor_sertifikat}}"/>
            <x-adminlte-input label="Kode KIB (Kartu Inventarisasi Barang) atas aset tanah dan bangunan *" name="kode_kib" type="text" placeholder="Kode KIB (Kartu Inventarisasi Barang) atas aset tanah dan bangunan" required value="{{$permohonan->kode_kib}}"/>
        </x-adminlte-card>   
        <x-adminlte-card title="Diskripsi Singkat Kerusakan" theme="secondary" theme-mode="outline" class="elevation-3" body-class="bg-light" header-class="bg-light" footer-class="bg-secondary border-top rounded border-light" icon="fas fa-lg fa-file" id="card-dokument">
            <x-adminlte-textarea name="deskripsi_singkat" placeholder="Diskripsi Singkat Kerusakan" label="Deskripsi Singkat Kerusakan *" required>{{$permohonan->deskripsi_singkat}}</x-adminlte-textarea>
        </x-adminlte-card>
        <x-adminlte-card title="Dokument Pendukung" theme="secondary" theme-mode="outline" class="elevation-3" body-class="bg-light" header-class="bg-light" footer-class="bg-secondary border-top rounded border-light" icon="fas fa-lg fa-file" id="card-dokument">
            <x-adminlte-input label="KTP" name="ktp" type="file" />
            <small class="text-danger d-block" style="margin-top: -15px;">* file harus pdf, max size 2mb</small>
            <a href="{{asset('storage').'/'. $permohonan->dokument_pertipe('ktp')->file}}" download><x-adminlte-button class="mb-2 btn-flat" label="Download" theme="success" type="button" /></a>
            <a href="{{asset('storage').'/'. $permohonan->dokument_pertipe('ktp')->file}}" target="_blank"><x-adminlte-button class="mb-2 btn-flat" label="View" theme="secondary" type="button" /></a>
            <x-adminlte-input label="KRK" name="krk" type="file" />
            <small class="text-danger d-block" style="margin-top: -15px;">* file harus pdf, max size 5mb</small>
            <a href="{{asset('storage').'/'. $permohonan->dokument_pertipe('krk')->file}}" download><x-adminlte-button class="mb-2 btn-flat" label="Download" theme="success" type="button" /></a>
            <a href="{{asset('storage').'/'. $permohonan->dokument_pertipe('krk')->file}}" target="_blank"><x-adminlte-button class="mb-2 btn-flat" label="View" theme="secondary" type="button" /></a>
            <x-adminlte-input label="Sertifikat" name="sertifikat" type="file" />
            <small class="text-danger d-block" style="margin-top: -15px;">* file harus pdf, max size 2mb</small>
            <a href="{{asset('storage').'/'. $permohonan->dokument_pertipe('sertifikat')->file}}" download><x-adminlte-button class="mb-2 btn-flat" label="Download" theme="success" type="button" /></a>
            <a href="{{asset('storage').'/'. $permohonan->dokument_pertipe('sertifikat')->file}}" target="_blank"><x-adminlte-button class="mb-2 btn-flat" label="View" theme="secondary" type="button" /></a>
            <x-adminlte-input label="Surat Pernyataan Readiness Criteria" name="surat_pernyataan" type="file" />
            <small class="text-danger d-block" style="margin-top: -15px;">* file harus pdf, max size 2mb</small>
            <a href="{{asset('storage').'/'. $permohonan->dokument_pertipe('surat_pernyataan')->file}}" download><x-adminlte-button class="mb-2 btn-flat" label="Download" theme="success" type="button" /></a>
            <a href="{{asset('storage').'/'. $permohonan->dokument_pertipe('surat_pernyataan')->file}}" target="_blank"><x-adminlte-button class="mb-2 btn-flat" label="View" theme="secondary" type="button" /></a>
            <x-slot name="prependSlot">
                <div class="input-group-text bg-danger">
                    <i class="fas fa-id-card"></i>
                </div>
            </x-slot>
        </x-adminlte-card>
        <x-adminlte-card title="Foto Kerusakan" theme="secondary" theme-mode="outline" class="elevation-3" body-class="bg-light" header-class="bg-light" footer-class="bg-secondary border-top rounded border-light" icon="fas fa-lg fa-image" id="card-dokument">
            @foreach ($permohonan->foto_kerusakan as $value)
            <div class="form-group">
                <img src="{{asset('storage').'/'. $value->foto}}" width="150px" alt="" srcset="" class="mb-3">
                <x-adminlte-button theme="outline-danger" label="Hapus" data-toggle="modal" data-target="#modalDelete{{$value->id}}" />
                <x-adminlte-modal id="modalDelete{{$value->id}}" title="Hapus Gambar ?" size="sm" theme="teal" icon="fas fa-bell" v-centered static-backdrop scrollable>
                    <x-slot name="footerSlot">
                        <x-adminlte-button theme="danger" class="mr-auto" label="Batal" data-dismiss="modal" />
                        <x-adminlte-button type="button" theme="success" label="OK" onclick="deleteSubmit(`{{$value->id}}`)" />
                    </x-slot>
                </x-adminlte-modal>
            </div>
            @endforeach
            <small class="text-danger d-block" style="margin-top: -15px;">* file harus jpg, png atau jpeg dan max size 2mb</small>
            <x-adminlte-input name="foto[]" type="file" igroup-size="lg">
                <x-slot name="appendSlot">
                    <x-adminlte-button theme="outline-success" label="+" id="buttonFoto" />
                </x-slot>
            </x-adminlte-input>
            <div id="inputFoto"></div>
        </x-adminlte-card>
        <x-adminlte-button class="mb-2 btn-flat" label="Simpan" theme="success" type="button" onclick="submitForms()" />
    </form>
</div>
@stop

@section('css')
{{-- Add here extra stylesheets --}}
{{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>\
<script src='https://api.mapbox.com/mapbox.js/plugins/leaflet-fullscreen/v1.0.1/Leaflet.fullscreen.min.js'></script>
<link href='https://api.mapbox.com/mapbox.js/plugins/leaflet-fullscreen/v1.0.1/leaflet.fullscreen.css' rel='stylesheet' />
<script>
    $("#telp, #nip").on('keyup change', function() {
        val = $(this).val() || 0;
        if (isNaN(val)) {
            $(this).val("");
        }
    });
    $("#status_tanah").change(function() {
        var val = $(this).val();
        if (val == 'HAK MILIK') {
            $('#nomor_sertifikat').val('HM.');
        } else if (val == 'HAK GUNA BANGUNAN') {
            $('#nomor_sertifikat').val('HGB.');
        } else if (val == 'HAK GUNA USAHA') {
            $('#nomor_sertifikat').val('HGU.');
        } else if (val == 'HAK PAKAI') {
            $('#nomor_sertifikat').val('HP.');
        } else if (val == 'HAK PENGELOLAAN') {
            $('#nomor_sertifikat').val('HPL.');
        } else if (val == 'HAK SATUAN RUMAH SUSUN') {
            $('#nomor_sertifikat').val('HSRS.');
        } else if (val == 'TANAH NEGARA') {
            $('#nomor_sertifikat').val('TN.');
        } else {
            $('#nomor_sertifikat').val('No.');
        }
    });
    $('#nama_pejabat, #jabatan, #nama_sertifikat, #nama_bangunan').keyup(function() {
        $(this).val($(this).val().toUpperCase());
    });
    function submitForms() {
        document.getElementById("form").submit();
    }

    function deleteSubmit(id) {
        console.log(id);
        document.getElementById("form").submit();
        var token =
            $('<input>', {
                'type': 'hidden',
                'name': '_token',
                'value': '{{ csrf_token() }}'
            });
        var hiddenInput =
            $('<input>', {
                'name': '_method',
                'type': 'hidden',
                'value': 'DELETE'
            });
        var form =
            $('<form>', {
                'method': 'POST',
                'action': `{{url('foto_kerusakan')}}/`+id
            });

        // var form = this.closest('.form');
        // console.log(form);
        form.append(token, hiddenInput).appendTo('body');
        form.submit();
    }
    var map = L.map('map').setView([-6.99155435231046, 110.42349815368654], 12);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap'
    }).addTo(map);
    let latitude = "{{$permohonan->bangunan->latitude}}";
    let longitude = "{{$permohonan->bangunan->longitude}}";
    let marker = L.marker([latitude, longitude]).addTo(map);
    map.on('click', (event) => {
        let latitude = event.latlng.lat;
        let longitude = event.latlng.lng;
        if (marker !== null) {
            map.removeLayer(marker);
        }
        marker = L.marker([latitude, longitude]).addTo(map);
        document.getElementById('latitude').value = event.latlng.lat;
        document.getElementById('longitude').value = event.latlng.lng;
    })
    map.addControl(new L.Control.Fullscreen({
        title: {
            'false': 'View Fullscreen',
            'true': 'Exit Fullscreen'
        }
    }));
    // $('#card-pejabat').on('collapsed.lte.cardwidget').CardWidget('collapse')
    // $('#card-bangunan').on('collapsed.lte.cardwidget').CardWidget('collapse')
    // $('#card-dokument').on('collapsed.lte.cardwidget').CardWidget('collapse')
    $(document).ready(function() {
        window.btnDel = function(e) {
            e.closest('.form-group').remove();
        }
        $('#buttonFoto').on('click', function() {
            $('#inputFoto').append(`
            <x-adminlte-input name="foto[]" type="file" igroup-size="lg">
                <x-slot name="appendSlot">
                    <x-adminlte-button theme="outline-danger" label="x" onclick="btnDel(this)"/>
                </x-slot>
            </x-adminlte-input>
            `);
        });
        $('#kecamatan').select2({
            ajax: {
                url: "{{ url('permohonan/kecamatan?') }}",
                type: 'GET',
                dataType: 'json',
                delay: 300,
                data: function(params) {
                    var queryParameters = {
                        name: params.term,
                    }
                    return queryParameters;
                },
                processResults: function(params) {
                    return {
                        results: $.map(params.data.kecamatan, function(item) {
                            return {
                                text: item.kecamatan,
                                id: item.kecamatan
                            }
                        })
                    };
                },
                cache: true
            }
        });
        var kecamatan = "{{$permohonan->bangunan->kecamatan}}";
        $('#kecamatan').on('change', function() {
            $('#kelurahan').val('').change();
            kecamatan = $('#kecamatan').val();
        })
        $('#kelurahan').select2({
            ajax: {
                url: "{{ url('permohonan/kelurahan?') }}",
                type: 'GET',
                dataType: 'json',
                delay: 300,
                data: function(params) {
                    var queryParameters = {
                        name: params.term,
                        kecamatan: kecamatan,
                    }
                    return queryParameters;
                },
                processResults: function(params) {
                    return {
                        results: $.map(params.data.kelurahan, function(item) {
                            return {
                                text: item.kelurahan,
                                id: item.kelurahan
                            }
                        })
                    };
                },
                cache: true
            }
        });
    });
</script>
<!-- <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script> -->
@stop