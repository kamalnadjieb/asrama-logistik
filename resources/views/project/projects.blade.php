@extends('base')

@section('title')
  proyek
@stop

@section('content')
  page={{$page}}/{{$totalPages}}<br/>
  <table>
  @foreach($projects as $project)
    <tr><td><a href="{{ URL::to('/logistik/proyek/'.$project->id)}}">{{$project->nama}}</a></td> <td>{{$project->lokasi}}</td> <td>{{$project->tanggal_mulai}}</td></tr>
  @endforeach

  @for($i=1;$i<=$totalPages;$i++)
      @if($i == $page)
          {{$i}}
      @else
          <a href="{{URL::to('/logistik/proyek/page/'.$i)}}">{{$i}} </a>
      @endif
  @endfor
</table>
@stop
