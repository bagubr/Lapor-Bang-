@extends('adminlte::page')

@section('title', 'Petugas Inspeksi')

@section('content_header')
<h1>Petugas Inspeksi</h1>
@stop

@section('content')
<div>
    {{-- Setup data for datatables --}}
    @php
    $heads = [
    'ID',
    'Name',
    ['label' => 'Email', 'width' => 40],
    ['label' => 'Actions', 'no-export' => true, 'width' => 5],
    ];
    $config = [
    'data' => $pemohon,
    'order' => [[1, 'asc']],
    'columns' => [null, null, null, ['orderable' => false]],
    ];
    $config['paging'] = true;
    $config["lengthMenu"] = [ 10, 50, 100, 500];
    @endphp
    <a href="{{route('inspektor.create')}}"><x-adminlte-button class="mb-2 btn-flat" label="Tambah" theme="success" icon="fas fa-lg fa-user-plus" /></a>
    {{-- Minimal example / fill data using the component slot --}}
    <x-adminlte-datatable id="table1" :heads="$heads">
        @foreach($config['data'] as $row)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$row['name']}}</td>
            <td>{{$row['email']}}</td>
            <td>
                <nobr>
                    <a href="{{route('inspektor.edit', $row['id'])}}">
                        <button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                            <i class="fa fa-lg fa-fw fa-pen"></i>
                        </button>
                    </a>
                    <a href="{{route('inspektor.show', $row['id'])}}">
                        <button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                            <i class="fa fa-lg fa-fw fa-eye"></i>
                        </button>
                    </a>
                    <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete" data-toggle="modal" data-target="#modalDelete{{$row['id']}}">
                        <i class="fa fa-lg fa-fw fa-trash"></i>
                    </button>
                    {{-- Minimal --}}
                    <x-adminlte-modal id="modalDelete{{$row['id']}}" title="Hapus Akun ?" size="sm" theme="teal" icon="fas fa-bell" v-centered static-backdrop scrollable>
                        <x-slot name="footerSlot">
                            <form action="{{route('inspektor.destroy', $row['id'])}}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <x-adminlte-button theme="danger" class="mr-auto" label="Batal" data-dismiss="modal" />
                                <x-adminlte-button type="submit" theme="success" label="OK" />
                            </form>
                        </x-slot>
                    </x-adminlte-modal>
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