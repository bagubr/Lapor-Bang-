
@extends('adminlte::page')

@section('title', 'Tambah Pemohon')

@section('content_header')
    <h1>Tambah Pemohon</h1>
@stop

@section('content')
    <div>
    <form action="{{route('pemohon.store')}}" method="POST">
        @csrf
        <x-adminlte-input label="Nama" name="name" type="text" placeholder="Example."/>
        <x-adminlte-input label="Email" name="email" type="email" placeholder="mail@example.com"/>
        <x-adminlte-input label="Password" name="password" type="password"/>
        <x-adminlte-input label="Konfirmasi Password" name="password_confirmation" type="password"/>
        
        <x-adminlte-button class="mb-2 btn-flat" label="Tambah" theme="success" type="submit"/>
    </form>
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <!-- <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script> -->
@stop
