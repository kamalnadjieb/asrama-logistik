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
    {{$item->nama}} {{$item->stok}}/{{$item->pivot->jumlah}} {{$item->satuan}} <br/>
    <select>
      <option value="0">Tidak ada pengubahan</option>
    @foreach($tipepengubahan as $tipe)
      <option value="{{$tipe->id}}">{{$tipe->nama}}</option>
    @endforeach
    </select>
    <input type="number" name="jumlah" min="0" max="{{$item->pivot->jumlah}}"> {{$item->satuan}}
  @endforeach
  <input type="submit" value="submit"/>
@stop
