@extends('base')

@section('title')
  proyek
@stop

@section('content')
  <form method="get" action="{{URL::to('/logistik/proyek/page/1')}}">
    <input name="key" type="text" onkeydown="if (event.keyCode == 13) { this.form.submit(); return false; }" placeholder="search"/>
  </form>

  <table>
  @foreach($projects as $project)
    <tr><td><a href="{{ URL::to('/logistik/proyek/'.$project->id)}}">{{$project->nama}}</a></td> <td>{{$project->lokasi}}</td> <td>{{$project->tanggal_mulai}}</td></tr>
  @endforeach
  </table>
  @if($page>1)
      <a href="{{URL::to($pageUrl.($page-1))}}">prev</a>&nbsp;
  @endif

  @for($i=1;$i<=$totalPages;$i++)
      @if($i == $page)
          {{$i}}&nbsp;
      @else
          <a href="{{URL::to($pageUrl.$i)}}">{{$i}}</a>&nbsp;
      @endif
  @endfor

  @if($page<$totalPages)
      <a href="{{URL::to($pageUrl.($page+1))}}">next</a>&nbsp;
  @endif
@stop
