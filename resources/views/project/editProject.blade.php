@extends('base')

@section('title')
  {{$project->nama}}
@stop

@section('content')
  <form id="editProject" method="POST" action="{{URL::to('logistik/proyek/edit/do')}}" onsubmit="return validateStok()">
    {{ csrf_field() }}
    <p>ID proyek: {{$project->id}}</p>

    <div class="form-group row">
        <label class="control-label col-sm-2" for="nama">Nama Proyek:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="nama" name="nama" value="{{$project->nama}}" required>
        </div>
    </div>

    <div class="form-group row">
        <label class="control-label col-sm-2" for="lokasi">Lokasi:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="lokasi" name="lokasi" value="{{$project->lokasi}}" required>
        </div>
    </div>

    <div class="form-group row">
        <label class="control-label col-sm-2" for="deskripsi">Deskripsi:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="{{$project->deskripsi}}" required>
        </div>
    </div>

    <div class="form-group row">
        <label class="control-label col-sm-2" for="tanggal_mulai">Tanggal Mulai:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="tanggal_mulai" name="tanggal_mulai" value="{{$project->tanggal_mulai}}" required>
        </div>
    </div>

    <br><br>
    <p>Daftar barang:</p>
    @foreach($items as $item)
      {{$item->nama}} {{$item->stok}}/<input type="number" name="jumlah_{{$item->pivot->id}}" min="0" value="{{$item->pivot->jumlah}}"> {{$item->satuan}} <br/>
    @endforeach
    <input type="submit" value="submit"/>
  </form>
@stop
@section('js')
  
@stop