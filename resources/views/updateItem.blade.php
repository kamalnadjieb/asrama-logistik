@extends('item')

@section('title')
  update barang
@stop

@section('content')
  <form method="POST" action="{{URL::to('logistik/barang/update/do')}}">
    {{ csrf_field() }}
    nama: <input name="nama" type="text"></input><br/>
    satuan: <input name="satuan" type="text"></input><br/>
    stok: <input name="stok" type="number"></input><br/>
    <input type="submit" value="submit"/>
  </form>
@stop
