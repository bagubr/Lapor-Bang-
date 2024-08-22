@extends('adminlte::page')

@section('title', 'Tambah Permohonan')

@section('content_header')
<h1>Tambah Permohonan</h1>
@stop

@section('content')
<div>
    <form action="{{route('permohonan.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <x-adminlte-card title="Data Pejabat" theme="secondary" theme-mode="outline" class="elevation-3" body-class="bg-light" header-class="bg-light" footer-class="bg-secondary border-top rounded border-light" icon="fas fa-lg fa-user" id="card-pejabat">
            <x-adminlte-input label="Nama *" name="nama_pejabat" id="nama_pejabat" type="text" placeholder="Nama" required/>
            <x-adminlte-textarea name="address" placeholder="Alamat *" label="Alamat" required/>
            <x-adminlte-input label="Jabatan *" id="jabatan" name="jabatan" type="text" placeholder="Ketua" required/>
            <x-adminlte-input label="NIP *" name="nip" id="nip" type="text" placeholder="NIP" required/>
            <x-adminlte-input label="Telp *" name="telp" id="telp" type="text" placeholder="Telp" required/>
            <x-adminlte-input label="SK Pejabat *" name="sk_jabatan" type="text" placeholder="SK" required/>
            <label for="">DINAS/OPD *</label>
            <select name="tipe_pejabat" class="select2 form-control" required>
                <option value="">Pilih OPD</option>
                <option value="BADAN RISET DAN INOVASI DAERAH">BADAN RISET DAN INOVASI DAERAH</option>
                <option value="SEKRETARIAT DPRD">SEKRETARIAT DPRD</option>
                <option value="SEKRETARIAT DAERAH">SEKRETARIAT DAERAH</option>
                <option value="SATUAN POLISI PAMONG PRAJA">SATUAN POLISI PAMONG PRAJA</option>
                <option value="RUMAH SAKIT UMUM DAERAH K.R.M.T WONGSONEGORO">RUMAH SAKIT UMUM DAERAH K.R.M.T WONGSONEGORO</option>
                <option value="KECAMATAN TUGU">KECAMATAN TUGU</option>
                <option value="KECAMATAN TEMBALANG">KECAMATAN TEMBALANG</option>
                <option value="KECAMATAN SEMARANG UTARA">KECAMATAN SEMARANG UTARA</option>
                <option value="KECAMATAN SEMARANG TIMUR">KECAMATAN SEMARANG TIMUR</option>
                <option value="KECAMATAN SEMARANG TENGAH">KECAMATAN SEMARANG TENGAH</option>
                <option value="KECAMATAN SEMARANG SELATAN">KECAMATAN SEMARANG SELATAN</option>
                <option value="KECAMATAN SEMARANG BARAT">KECAMATAN SEMARANG BARAT</option>
                <option value="KECAMATAN PEDURUNGAN">KECAMATAN PEDURUNGAN</option>
                <option value="KECAMATAN NGALIYAN">KECAMATAN NGALIYAN</option>
                <option value="KECAMATAN MIJEN">KECAMATAN MIJEN</option>
                <option value="KECAMATAN GUNUNGPATI">KECAMATAN GUNUNGPATI</option>
                <option value="KECAMATAN GENUK">KECAMATAN GENUK</option>
                <option value="KECAMATAN GAYAMSARI">KECAMATAN GAYAMSARI</option>
                <option value="KECAMATAN GAJAHMUNGKUR">KECAMATAN GAJAHMUNGKUR</option>
                <option value="KECAMATAN CANDISARI">KECAMATAN CANDISARI</option>
                <option value="KECAMATAN BANYUMANIK">KECAMATAN BANYUMANIK</option>
                <option value="INSPEKTORAT">INSPEKTORAT</option>
                <option value="DINAS TENAGA KERJA">DINAS TENAGA KERJA</option>
                <option value="DINAS SOSIAL">DINAS SOSIAL</option>
                <option value="DINAS PERUMAHAN DAN KAWASAN PERMUKIMAN">DINAS PERUMAHAN DAN KAWASAN PERMUKIMAN</option>
                <option value="DINAS PERTANIAN">DINAS PERTANIAN</option>
                <option value="DINAS PERINDUSTRIAN">DINAS PERINDUSTRIAN</option>
                <option value="DINAS PERIKANAN">DINAS PERIKANAN</option>
                <option value="DINAS PERHUBUNGAN">DINAS PERHUBUNGAN</option>
                <option value="DINAS PERDAGANGAN">DINAS PERDAGANGAN</option>
                <option value="DINAS PENGENDALIAN PENDUDUK DAN KELUARGA BERENCANA">DINAS PENGENDALIAN PENDUDUK DAN KELUARGA BERENCANA</option>
                <option value="DINAS PENDIDIKAN">DINAS PENDIDIKAN</option>
                <option value="DINAS PENATAAN RUANG">DINAS PENATAAN RUANG</option>
                <option value="DINAS PENANAMAN MODAL DAN PELAYANAN TERPADU SATU PINTU">DINAS PENANAMAN MODAL DAN PELAYANAN TERPADU SATU PINTU</option>
                <option value="DINAS PEMBERDAYAAN PEREMPUAN DAN PERLINDUNGAN ANAK">DINAS PEMBERDAYAAN PEREMPUAN DAN PERLINDUNGAN ANAK</option>
                <option value="DINAS PEMADAM KEBAKARAN">DINAS PEMADAM KEBAKARAN</option>
                <option value="DINAS PEKERJAAN UMUM">DINAS PEKERJAAN UMUM</option>
                <option value="DINAS LINGKUNGAN HIDUP">DINAS LINGKUNGAN HIDUP</option>
                <option value="DINAS KOPERASI DAN USAHA MIKRO">DINAS KOPERASI DAN USAHA MIKRO</option>
                <option value="DINAS KOMUNIKASI, INFORMATIKA, STATISTIK DAN PERSANDIAN">DINAS KOMUNIKASI, INFORMATIKA, STATISTIK DAN PERSANDIAN</option>
                <option value="DINAS KETAHANAN PANGAN">DINAS KETAHANAN PANGAN</option>
                <option value="DINAS KESEHATAN">DINAS KESEHATAN</option>
                <option value="DINAS KEPENDUDUKAN DAN PENCATATAN SIPIL">DINAS KEPENDUDUKAN DAN PENCATATAN SIPIL</option>
                <option value="DINAS KEPEMUDAAN DAN OLAHRAGA">DINAS KEPEMUDAAN DAN OLAHRAGA</option>
                <option value="DINAS KEBUDAYAAN DAN PARIWISATA">DINAS KEBUDAYAAN DAN PARIWISATA</option>
                <option value="DINAS ARSIP DAN PERPUSTAKAAN">DINAS ARSIP DAN PERPUSTAKAAN</option>
                <option value="BADAN PERENCANAAN PEMBANGUNAN DAERAH">BADAN PERENCANAAN PEMBANGUNAN DAERAH</option>
                <option value="BADAN PENGELOLAAN KEUANGAN DAN ASET DAERAH">BADAN PENGELOLAAN KEUANGAN DAN ASET DAERAH</option>
                <option value="BADAN PENDAPATAN DAERAH">BADAN PENDAPATAN DAERAH</option>
                <option value="BADAN PENANGGULANGAN BENCANA DAERAH">BADAN PENANGGULANGAN BENCANA DAERAH</option>
                <option value="BADAN KESATUAN BANGSA DAN POLITIK">BADAN KESATUAN BANGSA DAN POLITIK</option>
                <option value="BADAN KEPEGAWAIAN, PENDIDIKAN DAN PELATIHAN">BADAN KEPEGAWAIAN, PENDIDIKAN DAN PELATIHAN</option>
            </select>
        </x-adminlte-card>
        <x-adminlte-card title="Data Bangunan" theme="secondary" theme-mode="outline" class="elevation-3" body-class="bg-light" header-class="bg-light" footer-class="bg-secondary border-top rounded border-light" icon="fas fa-lg fa-building" id="card-bangunan">
            <x-adminlte-input label="Nama Bangunan *" name="nama_bangunan" id="nama_bangunan" type="text" placeholder="Nama Bangunan" required/>
            <x-adminlte-textarea name="lokasi" placeholder="Lokasi Bangunan" label="Lokasi Bangunan *" required/>
            <x-adminlte-select2 name="kecamatan" id="kecamatan" label="Kecamatan *" label-class="text-dark" igroup-size="lg" required>
                <option value="">Pilih Kecamatan</option>
            </x-adminlte-select2>
            <x-adminlte-select2 name="kelurahan" id="kelurahan" label="Kelurahan *" label-class="text-dark" igroup-size="lg" required>
                <option value="">Pilih Kelurahan</option>
            </x-adminlte-select2>
            <label for="">Koordinat *</label>
            <x-adminlte-input name="longitude" type="hidden" id="longitude" value="" required/>
            <x-adminlte-input name="latitude" type="hidden" id="latitude" value="" required/>
            <div style="width:100%;height:400px; ">
                <div style="width: 100%; height: 100%" id="map"></div>
            </div>
        </x-adminlte-card>
        <x-adminlte-card title="Data Sertifikat" theme="secondary" theme-mode="outline" class="elevation-3" body-class="bg-light" header-class="bg-light" footer-class="bg-secondary border-top rounded border-light" icon="fas fa-lg fa-file" id="card-sertifikat">
            <x-adminlte-input label="Nama Sertifikat (Sesuaikan Sertifikat) *" name="nama_sertifikat" type="text" placeholder="Nama Sertifikat" required id="nama_sertifikat"/>
            <x-adminlte-select name="status_tanah" id="status_tanah" label="Status Tanah *" label-class="text-dark" required>
                <option value="">--- Pilih Status Tanah ---</option>
                <option value="HAK MILIK">HAK MILIK</option>
                <option value="HAK GUNA BANGUNAN">HAK GUNA BANGUNAN</option>
                <option value="HAK GUNA USAHA">HAK GUNA USAHA</option>
                <option value="HAK PAKAI">HAK PAKAI</option>
                <option value="HAK PENGELOLAAN">HAK PENGELOLAAN</option>
                <option value="HAK SATUAN RUMAH SUSUN">HAK SATUAN RUMAH SUSUN</option>
                <option value="TANAH YASAN (LETTER C/D)">TANAH YASAN (LETTER C/D)</option>
                <option value="TANAH NEGARA">TANAH NEGARA</option>
                <option value="TANAH WAKAF">TANAH WAKAF</option>

            </x-adminlte-select>
            <x-adminlte-input label="Nomor Sertifikat *" id="nomor_sertifikat" name="nomor_sertifikat" type="text" placeholder="Nomor Sertifikat" required/>
            <x-adminlte-input label="Kode KIB (Kartu Inventarisasi Barang) atas aset tanah dan bangunan *" name="kode_kib" type="text" placeholder="Kode KIB (Kartu Inventarisasi Barang) atas aset tanah dan bangunan" required/>
        </x-adminlte-card>    
        <x-adminlte-card title="Diskripsi Singkat Kerusakan" theme="secondary" theme-mode="outline" class="elevation-3" body-class="bg-light" header-class="bg-light" footer-class="bg-secondary border-top rounded border-light" icon="fas fa-lg fa-edit" id="card-dokument">
            <x-adminlte-textarea name="deskripsi_singkat" placeholder="Diskripsi Singkat Kerusakan" label="Deskripsi Singkat Kerusakan *" required/>
        </x-adminlte-card>
        <x-adminlte-card title="Dokument Pendukung" theme="secondary" theme-mode="outline" class="elevation-3" body-class="bg-light" header-class="bg-light" footer-class="bg-secondary border-top rounded border-light" icon="fas fa-lg fa-file" id="card-dokument">
            <x-adminlte-input label="KTP" name="ktp" type="file" required/>
            <small class="text-danger d-block" style="margin-top: -15px;">* file harus pdf, max size 2mb</small>
            <x-adminlte-input label="KRK" name="krk" type="file" required/>
            <small class="text-danger d-block" style="margin-top: -15px;">* file harus pdf, max size 5mb</small>
            <x-adminlte-input label="Sertifikat" name="sertifikat" type="file" required/>
            <small class="text-danger d-block" style="margin-top: -15px;">* file harus pdf, max size 2mb</small>
            <x-adminlte-input label="Surat Pernyataan Readiness Criteria" name="surat_pernyataan" type="file" required/>
            <small class="text-danger d-block" style="margin-top: -15px;">* file harus pdf, max size 2mb</small>
            <x-slot name="prependSlot">
                <div class="input-group-text bg-danger">
                    <i class="fas fa-id-card"></i>
                </div>
            </x-slot>
        </x-adminlte-card>
        <x-adminlte-card title="Foto Kerusakan" theme="secondary" theme-mode="outline" class="elevation-3" body-class="bg-light" header-class="bg-light" footer-class="bg-secondary border-top rounded border-light" icon="fas fa-lg fa-image" id="card-dokument">
        <small class="text-danger d-block" style="margin-top: -15px;">* file harus pdf, max size 2mb</small>
            <x-adminlte-input name="foto[]" type="file" igroup-size="lg" required>
                <x-slot name="appendSlot">
                    <x-adminlte-button theme="outline-success" label="+" id="buttonFoto" />
                </x-slot>
            </x-adminlte-input>
            <div id="inputFoto"></div>
        </x-adminlte-card>
        <x-adminlte-button class="mb-2 btn-flat" label="Simpan" theme="success" type="submit" />
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
        console.log(val);
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
    var map = L.map('map').setView([-6.99155435231046, 110.42349815368654], 12);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap'
    }).addTo(map);
    let marker = null;
    map.on('click', (event) => {
        if (marker !== null) {
            map.removeLayer(marker);
        }
        marker = L.marker([event.latlng.lat, event.latlng.lng]).addTo(map);
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
        window.btnDel = function (e){
            e.closest('.form-group').remove();
        }
        $('#buttonFoto').on('click', function(){
            $('#inputFoto').append(`
            <x-adminlte-input name="foto[]" type="file" igroup-size="lg" required>
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
        var kecamatan;
        $('#kecamatan').on('change', function() {
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