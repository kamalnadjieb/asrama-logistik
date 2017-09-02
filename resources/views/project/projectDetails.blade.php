@extends('base')

@section('title')
  {{$project->nama}}
@stop

@section('content')
  <p>ID proyek: {{$project->id}}</p>
  <p>Nama proyek: {{$project->nama}}</p>
  <p>Lokasi: {{$project->lokasi}}</p>
  <p>Deskripsi: {{$project->deskripsi}}</p>
  <p>Tanggal mulai: {{$project->tanggal_mulai}}</p>

  <br><br>
  <p>Daftar barang:</p>
  @foreach($items as $item)
    {{$item->nama}} {{$item->stok}}/{{$item->pivot->jumlah}} {{$item->satuan}}<br/>
  @endforeach
@stop
