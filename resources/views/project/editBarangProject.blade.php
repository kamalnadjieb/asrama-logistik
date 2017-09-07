@extends('base')

@section('title')
  {{$project->nama}}
@stop

@section('content')
  <form id="editBarangProject" method="POST" action="{{URL::to('logistik/proyek/edit-barang/do')}}">
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
      <div class="row">
        <div class="col-md-6">
          <input type="radio" name="tipe_pengubahan_{{$item->pivot->id}}" value="0" checked>Tidak ada pengubahan<br>
          @foreach($tipepengubahan as $tipe)
            <input type="radio" name="tipe_pengubahan_{{$item->pivot->id}}" value="{{$tipe->id}}">{{$tipe->nama}}<br/>
          @endforeach
        </div>
        <div class="col-md-6">
          <input type="number" name="jumlah_{{$item->pivot->id}}" min="0" max="{{$item->stok}}"> {{$item->satuan}}
        </div>
      </div>
    @endforeach
    <input type="submit" value="submit"/>
  </form>
@stop
@section('js')
  
@stop