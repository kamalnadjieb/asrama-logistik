@extends('base')

@section('title')
  {{$project->nama}}
@stop

@section('content')
  <form id="editBarangProject" method="POST" action="{{URL::to('logistik/proyek/tambah/do')}}" onsubmit="return validateStok()">
    {{ csrf_field() }}
    <p>ID proyek: {{$project->id}}</p>
    <p>Nama proyek: {{$project->nama}}</p>
    <p>Lokasi: {{$project->lokasi}}</p>
    <p>Deskripsi: {{$project->deskripsi}}</p>
    <p>Tanggal mulai: {{$project->tanggal_mulai}}</p>

    <br><br>
    <p>Daftar barang:</p>
    @foreach($items as $item)
      {{$item->nama}} {{$item->stok}}/{{$item->pivot->jumlah}} {{$item->satuan}} <br/>
      <select name="tipe_pengubahan_{{$item->pivot->id}}">
        <option value="0">Tidak ada pengubahan</option>
      @foreach($tipepengubahan as $tipe)
        <option value="{{$tipe->id}}">{{$tipe->nama}}</option>
      @endforeach
      </select>
      <input type="number" name="jumlah_{{$item->pivot->id}}" min="0" max="{{$item->pivot->jumlah}}"> {{$item->satuan}}
    @endforeach
    <input type="submit" value="submit"/>
  </form>
@stop
@section('js')
  
@stop