@extends('adminlte::page')

@section('title', 'Detail Permohonan')

@section('content_header')
<h1>Detail Permohonan</h1>
@stop

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header p-2">
            <div class="card-title p-2">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#pejabat" data-toggle="tab">Data Permohonan</a></li>
                    <li class="nav-item"><a class="nav-link" href="#dokument" data-toggle="tab">Data Dokumen dan Foto</a></li>
                </ul>
            </div>
            <div class="card-tools p-2 mr-1">
                @if (Auth::user()->tipe_user == 'ADMIN')
                <form action="{{route('kirim', $permohonan->permohonan_id)}}" method="POST">
                    @csrf
                    @if ($permohonan->status == 'Pending')
                    <x-adminlte-input name="status" type="hidden" value="Inspek" />
                    <select name="klasifikasi" class="custom-select w-auto form-control-border bg-light" id="selectKlasifikasi">
                        <option value="">Pilih Klasifikasi</option>
                        <option value="Ringan" {{($permohonan->klasifikasi == 'Ringan')?'selected':''}}>Ringan</option>
                        <option value="Sedang" {{($permohonan->klasifikasi == 'Sedang')?'selected':''}}>Sedang</option>
                        <option value="Berat" {{($permohonan->klasifikasi == 'Berat')?'selected':''}}>Berat</option>
                    </select>
                    @elseif($permohonan->status != 'Pending')
                    <select name="status" class="custom-select w-auto form-control-border bg-light" id="selectKlasifikasi">
                        <option value="">Pilih Proses</option>
                        <option value="Accept" {{($permohonan->status == 'Accept')?'selected':''}}>Terima</option>
                        <option value="Reject" {{($permohonan->status == 'Reject')?'selected':''}}>Tolak</option>
                    </select>
                    @endif
                    @if ($permohonan->status != 'Inspek')
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalKlasifikasi" id="buttonKlasifikasi">
                        Kirim
                    </button>
                    @endif
                    <x-adminlte-modal id="modalKlasifikasi" title="Kirim Permohonan" size="sm" theme="info"
                        v-centered static-backdrop scrollable>
                        <x-adminlte-input name="user_id" type="hidden" value="{{Auth::user()->id}}" />
                        <x-adminlte-textarea name="catatan" placeholder="Keterangan" label="Keterangan"></x-adminlte-textarea>
                        @if ($permohonan->status == 'Pending')
                        <select name="to_user_id" class="custom-select w-auto form-control-border bg-light">
                            <option value="">Pilih Inspektor</option>
                            @foreach ($inspektor as $inspek)
                            <option value="{{$inspek->id}}" {{(@$permohonan->inspeksi->inspektor->name == $inspek->name)?'selected':''}}>{{$inspek->name}}</option>
                            @endforeach
                        </select>
                        @endif
                        <x-slot name="footerSlot">
                            <x-adminlte-button theme="danger" class="mr-auto" label="Batal" data-dismiss="modal" />
                            <x-adminlte-button type="submit" theme="success" label="Kirim" />
                        </x-slot>
                    </x-adminlte-modal>
                </form>
                @endif
            </div>
        </div><!-- /.card-header -->
        <div class="card-body">
            <div class="tab-content">
                <div class="active tab-pane" id="pejabat">
                    <div class="form-group row">
                        <label for="nama_pejabat" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama_pejabat" value="{{$permohonan->pejabat->nama_pejabat}}" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="email" value="{{$permohonan->pejabat->user->email}}" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="address" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="address" disabled>{{$permohonan->pejabat->address}}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="jabatan" value="{{$permohonan->pejabat->jabatan}}" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nip" class="col-sm-2 col-form-label">NIP</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nip" value="{{$permohonan->pejabat->nip}}" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="telp" class="col-sm-2 col-form-label">Telp</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="telp" value="{{$permohonan->pejabat->telp}}" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="sk_jabatan" class="col-sm-2 col-form-label">SK Pejabat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="sk_jabatan" value="{{$permohonan->pejabat->sk_jabatan}}" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">DINAS/OPD</label>
                        <div class="col-sm-10">
                            <select name="tipe_pejabat" class="select2 form-control" disabled>
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
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama_bangunan" class="col-sm-2 col-form-label">Nama Bangunan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama_bangunan" value="{{$permohonan->bangunan->nama_bangunan}}" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lokasi" class="col-sm-2 col-form-label">Lokasi Bangunan</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="lokasi" disabled>{{$permohonan->bangunan->lokasi}}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="kecamatan" class="col-sm-2 col-form-label">Kecamatan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="kecamatan" value="{{$permohonan->bangunan->kecamatan}}" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="kelurahan" class="col-sm-2 col-form-label">Kelurahan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="kelurahan" value="{{$permohonan->bangunan->kelurahan}}" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="koordinat" class="col-sm-2 col-form-label">Koordinat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="koordinat" value="({{substr($permohonan->bangunan->latitude, 0,10)}}, {{substr($permohonan->bangunan->longitude,0,10)}})" disabled>
                        </div>
                    </div>
                    <div style="width:100%;height:400px; ">
                        <div style="width: 100%; height: 100%" id="map"></div>
                    </div>
                </div>
                <!-- /.tab-pane -->
                <!-- /.tab-pane -->

                <div class="tab-pane" id="dokument">

                    <!-- The timeline -->
                    <div class="timeline timeline-inverse">
                        <!-- /.timeline-label -->
                        <!-- timeline item -->
                        <div>
                            <i class="far fa-image bg-gray"></i>

                            <div class="timeline-item">
                                <h3 class="timeline-header">Foto Kerusakan</h3>

                                <div class="timeline-body">
                                    @foreach ($permohonan->foto_kerusakan->where('tipe_foto', 'USER') as $val)
                                    <img src="{{asset('storage/'.$val->foto)}}" width="150" height="100" alt="...">
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!-- END timeline item -->
                        <div>
                            <i class="far fa-file bg-gray"></i>
                            <div class="timeline-item">
                                <h3 class="timeline-header">File Dokumen</h3>

                                <div class="timeline-body">
                                    <table class="table">
                                        <tr>
                                            <th>Nama Dokumen</th>
                                            <th>File</th>
                                            <th>Tanggal Upload</th>
                                        </tr>
                                        @foreach ($permohonan->dokument as $val)
                                        <tr>
                                            <td>
                                                <p>{{$val->tipe_dokument}}</p>
                                            </td>
                                            <td>
                                                <a href="{{asset('storage/'.$val->file)}}" target="download"><button class="btn btn-sm btn-success mr-2">Download</button></a>
                                                <a href="{{asset('storage/'.$val->file)}}" target="_blank"><button class="btn btn-sm btn-secondary">View</button></a>
                                            </td>
                                            <td>
                                                {{date('d-m-Y', strtotime($val->tanggal_upload))}}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div>
                            <i class="fas fa-history bg-gray"></i>
                            <div class="timeline-item">
                                <h3 class="timeline-header">History</h3>
                                    <table class="table">
                                        <tr>
                                            <th>ID</th>
                                            <th>Petugas</th>
                                            <th>Petugas Selanjutnya</th>
                                            <th>Keterangan</th>
                                            <th>Status</th>
                                            <th>Tanggal</th>
                                        </tr>
                                        @foreach ($permohonan->logs as $log)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$log->user->name}}</td>
                                            <td>{{$log->to_user->name}}</td>
                                            <td>{{$log->catatan}}</td>
                                            <td>{{$log->status}}</td>
                                            <td>{{date('d-m-Y H:i:s', strtotime($log->created_at))}}</td>
                                        </tr>
                                        @endforeach
                                    </table>
                            </div>
                        </div>
                        <div>
                            <i class="far fa-comment bg-gray"></i>
                            <div class="timeline-item">
                                <h3 class="timeline-header">Diskripsi Singkat</h3>

                                <div class="timeline-body">
                                    {{$permohonan->deskripsi_singkat}}
                                </div>
                            </div>
                        </div>
                        @if ($permohonan->inspeksi)
                        <div>
                            <i class="far fa-edit bg-gray"></i>
                            <div class="timeline-item">
                                <h3 class="timeline-header">Proses Inspeksi</h3>

                                <div class="timeline-body">
                                    Klasifikasi : {{$permohonan->klasifikasi}}

                                </div>
                                <div class="timeline-body">
                                    Inspektor : {{$permohonan->inspeksi->inspektor->name}}
                                </div>
                                <div class="timeline-body">
                                    @foreach ($permohonan->foto_kerusakan->where('tipe_foto', 'INSPEK') as $val)
                                    <img src="{{asset('storage/'.$val->foto)}}" width="150" height="100" alt="...">
                                    @endforeach
                                    <form action="{{route('foto_kerusakan.inspeksi', $permohonan->inspeksi->inspeksi_id)}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <x-adminlte-textarea name="catatan_inspeksi" placeholder="Hasil Inspeksi" label="Hasil Inspeksi" style="height:400px;" required>{{$permohonan->inspeksi->catatan_inspeksi}}</x-adminlte-textarea>
                                        @if (Auth::user()->tipe_user == 'INSPEK')
                                        <small class="text-danger d-block" style="margin-top: -15px;">* file harus pdf, max size 2mb</small>
                                        <x-adminlte-input name="foto[]" type="file" igroup-size="lg">
                                            <x-slot name="appendSlot">
                                                <x-adminlte-button theme="outline-success" label="+" id="buttonFoto" />
                                            </x-slot>
                                        </x-adminlte-input>
                                        <div id="inputFoto"></div>
                                        <x-adminlte-button class=" mr-auto mb-2 btn-flat" label="Kirim" theme="success" type="button" data-toggle="modal" data-target="#modalInspek" />
                                        <x-adminlte-modal id="modalInspek" title="Kirim Permohonan" size="sm" theme="info"
                                            v-centered static-backdrop scrollable>
                                            <x-adminlte-textarea name="catatan" placeholder="Keterangan" label="Keterangan"></x-adminlte-textarea>
                                            <x-slot name="footerSlot">
                                                <x-adminlte-button theme="danger" class="mr-auto" label="Batal" data-dismiss="modal" />
                                                <x-adminlte-button type="submit" theme="success" label="Kirim" />
                                            </x-slot>
                                        </x-adminlte-modal>
                                        @endif
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endif
                        <div>
                            <i class="fas fa-list bg-gray"></i>
                        </div>
                    </div>
                </div>
                <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
        </div><!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.col -->@stop

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
    let latitude = "{{$permohonan->bangunan->latitude}}";
    let longitude = "{{$permohonan->bangunan->longitude}}";
    var map = L.map('map').setView([latitude, longitude], 12);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap'
    }).addTo(map);
    let marker = L.marker([latitude, longitude]).addTo(map);
    map.addControl(new L.Control.Fullscreen({
        title: {
            'false': 'View Fullscreen',
            'true': 'Exit Fullscreen'
        }
    }));
    $('select').on('change', function() {
        if (this.value == '') {
            $('#buttonKlasifikasi').attr("disabled", true);
        } else {
            $('#buttonKlasifikasi').attr("disabled", false);
        }
    });
    window.btnDel = function(e) {
        e.closest('.form-group').remove();
    }
    $('#buttonFoto').on('click', function() {
        $('#inputFoto').append(`
            <x-adminlte-input name="foto[]" type="file" igroup-size="lg" required>
                <x-slot name="appendSlot">
                    <x-adminlte-button theme="outline-danger" label="x" onclick="btnDel(this)"/>
                </x-slot>
            </x-adminlte-input>
            `);
    });
</script>
@stop