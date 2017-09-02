@extends('base')

@section('title')
  barang
@stop

@section('content')
	<a href="{{url('/logistik/barang/create')}}">Tambah barang</a>
	<br/>
	<br/>
	@foreach($items as $item)
	  {{$item->nama}} {{$item->stok}} {{$item->satuan}} <a href="{{url('/logistik/barang/' . $item->id . '/edit')}}">edit</a><br/>
	@endforeach
@stop
