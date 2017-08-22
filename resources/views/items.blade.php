@extends('base')

@section('title')
  barang
@stop

@section('content')
  @foreach($items as $item)
    {{$item->nama}}<br/>
  @endforeach
@stop
