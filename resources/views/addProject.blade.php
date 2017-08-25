@extends('base')

@section('title')
  tambah proyek
@stop

@section('content')
  <form method="POST" action="{{URL::to('logistik/proyek/tambah/do')}}">
    {{ csrf_field() }}
    nama: <input name="nama" type="text"></input><br/>
    lokasi: <input name="lokasi" type="text"></input><br/>
    deskripsi: <input name="deskripsi" type="text"></input><br/>
    tanggal_mulai: <input name="tanggal mulai" type="date"></input><br/>
    <input type="submit" value="submit"/>
  </form>
@stop
