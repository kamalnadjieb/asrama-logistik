@extends('base')

@section('title')
  barang
@stop

@section('content')
	<div class="space"></div>
	<table class="table table-hover">
			@foreach($items as $item)
			<tr>
				<td>
					{{$item->nama}}
				</td>
				<td>
					{{$item->stok}}
				</td>
				<td>
					{{$item->satuan}}
				</td>
				<td>
					<a href="{{url('/logistik/barang/' . $item->id . '/edit')}}">edit</a>
				</td>
			</tr>
			@endforeach
	</table>
@stop
