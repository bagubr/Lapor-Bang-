
@extends('adminlte::page')

@section('title', 'Detail Pemohon')

@section('content_header')
    <h1>Detail Pemohon</h1>
@stop

@section('content')
    <div>
        <x-adminlte-input label="Nama" name="name" type="text" placeholder="Example." value="{{$pemohon->name}}" disabled/>
        <x-adminlte-input label="Email" name="email" type="email" placeholder="mail@example.com" value="{{$pemohon->email}}" disabled/>
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <!-- <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script> -->
@stop
