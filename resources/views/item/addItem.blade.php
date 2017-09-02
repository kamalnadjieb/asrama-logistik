@extends('item.item')

@section('title')
  tambah barang
@stop

@section('content')
  <form method="POST" action="{{url('logistik/barang')}}">
    {{ csrf_field() }}
    nama: <input name="nama" type="text"></input><br/>
    satuan: <input name="satuan" type="text"></input><br/>
    stok: <input name="stok" type="number"></input><br/>
    <input type="submit" value="submit"/>
  </form>
@stop
