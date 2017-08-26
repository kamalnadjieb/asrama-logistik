@extends('base')

@section('title')
  proyek
@stop

@section('content')
  <table>
  @foreach($projects as $project)
    <tr><td><a href="{{ URL::to('/logistik/proyek/'.$project->id)}}">{{$project->nama}}</a></td> <td>{{$project->lokasi}}</td> <td>{{$project->tanggal_mulai}}</td></tr>
  @endforeach
</table>
@stop
