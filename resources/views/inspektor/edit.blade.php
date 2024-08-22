
@extends('adminlte::page')

@section('title', 'Edit Petugas Inspeksi')

@section('content_header')
    <h1>Edit Petugas Inspeksi</h1>
@stop

@section('content')
    <div>
    <form action="{{route('inspektor.update', $inspektor->id)}}" method="POST">
        @csrf
        @method('PUT')
        <x-adminlte-input label="Nama" name="name" type="text" placeholder="Example." value="{{$inspektor->name}}"/>
        <x-adminlte-input label="Email" name="email" type="email" placeholder="mail@example.com" value="{{$inspektor->email}}"/>
        <x-adminlte-input label="Password" name="password" type="password"/>
        <x-adminlte-input label="Konfirmasi Password" name="password_confirmation" type="password"/>
        
        <x-adminlte-button class="mb-2 btn-flat" label="Edit" theme="success" type="submit"/>
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
