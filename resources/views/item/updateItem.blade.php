@extends('item.item')

@section('title')
  update barang
@stop

@section('content')
  <form method="PUT" action="{{url('logistik/barang/' . $item->id)}}">
    {{ csrf_field() }}
    nama: <input name="nama" type="text" value="{{$item->nama}}"></input><br/>
    satuan: <input name="satuan" type="text" value="{{$item->satuan}}"></input><br/>
    stok: <input name="stok" type="number" min="0" value="{{$item->stok}}"></input><br/>
    <input type="submit" value="submit"/>
  </form>
@stop
