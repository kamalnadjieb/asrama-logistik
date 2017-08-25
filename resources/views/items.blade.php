@extends('base')

@section('title')
  barang
@stop

@section('content')
  @foreach($items as $item)
    {{$item->nama}} {{$item->stok}} {{$item->satuan}}<br/>
  @endforeach
@stop
