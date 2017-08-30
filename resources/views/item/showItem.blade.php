@extends('item.item')

@section('title')
  lihat barang
@stop

@section('content')
    nama: {{$item->nama}}<br/>
    satuan: {{$item->satuan}}<br/>
    stok: {{$item->stok}}<br/>
@stop