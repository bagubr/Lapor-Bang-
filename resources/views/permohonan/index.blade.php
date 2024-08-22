@extends('adminlte::page')

@section('title', 'Permohonan')

@section('content_header')
<h1>Permohonan</h1>
@stop

@section('content')
<div>
    {{-- Setup data for datatables --}}
    @php
    $heads = [
    'ID',
    'Nama',
    'Telp',
    'Nama Bangunan',
    'Alamat Lokasi',
    'Kecamatan',
    'Kelurahan',
    'Klasifikasi',
    'Tanggal Permohonan',
    ['label' => 'Actions', 'no-export' => true, 'width' => 5],
    ];
    if(Auth::user()->tipe_user == 'USER'){
        $heads[7] = 'Status';
    }
    $config = [
    'data' => $permohonan,
    'order' => [[1, 'asc']],
    'columns' => [null, null, null, ['orderable' => false]],
    ];
    $config['paging'] = true;
    $config["lengthMenu"] = [ 10, 50, 100, 500];
    @endphp
    @if (Route::is('permohonan.create'))
    <a href="{{route('permohonan.create')}}"><x-adminlte-button class="mb-2 btn-flat" label="Buat Permohonan" theme="success" icon="fas fa-lg fa-file" /></a>
    @endif
    {{-- Minimal example / fill data using the component slot --}}
    <x-adminlte-datatable id="table1" :heads="$heads">
        @foreach($config['data'] as $row)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$row['pejabat']['nama_pejabat']}}</td>
            <td>{{$row['pejabat']['telp']}}</td>
            <td>{{$row['bangunan']['nama_bangunan']}}</td>
            <td>{{$row['bangunan']['lokasi']}}</td>
            <td>{{$row['bangunan']['kecamatan']}}</td>
            <td>{{$row['bangunan']['kelurahan']}}</td>
            @if (Auth::user()->tipe_user == 'USER')
            <td>{{$row['status']}}</td>
            @else
            <td>{{$row['klasifikasi']}}</td>
            @endif
            <td>{{date('d-m-Y', strtotime($row['tanggal_permohonan']))}}</td>
            <td>
                <nobr>
                    @if (Auth::user()->tipe_user == 'ADMIN')
                    <a href="{{route('permohonan.edit', $row['permohonan_id'])}}">
                        <button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                            <i class="fa fa-lg fa-fw fa-pen"></i>
                        </button>
                    </a>
                    @endif
                    <a href="{{route('permohonan.show', $row['permohonan_id'])}}">
                        <button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                            <i class="fa fa-lg fa-fw fa-eye"></i>
                        </button>
                    </a>
                    @if (Auth::user()->tipe_user == 'ADMIN')
                    <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete" data-toggle="modal" data-target="#modalDelete{{$row['permohonan_id']}}">
                        <i class="fa fa-lg fa-fw fa-trash"></i>
                    </button>
                    {{-- Minimal --}}
                    <x-adminlte-modal id="modalDelete{{$row['permohonan_id']}}" title="Hapus Akun ?" size="sm" theme="teal" icon="fas fa-bell" v-centered static-backdrop scrollable>
                        <x-slot name="footerSlot">
                            <form action="{{route('permohonan.destroy', $row['permohonan_id'])}}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <x-adminlte-button theme="danger" class="mr-auto" label="Batal" data-dismiss="modal" />
                                <x-adminlte-button type="submit" theme="success" label="OK" />
                            </form>
                        </x-slot>
                    </x-adminlte-modal>
                    @endif
                </nobr>
            </td>
        </tr>
        @endforeach
    </x-adminlte-datatable>
</div>
@stop

@section('css')
{{-- Add here extra stylesheets --}}
{{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
<!-- <script>
    console.log("Hi, I'm using the Laravel-AdminLTE package!");
</script> -->
@stop