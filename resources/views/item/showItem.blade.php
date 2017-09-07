@extends('item.item')

@section('title')
  lihat barang
@stop

@section('content')
    <table class="table table-hover">
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
	</table>
@stop