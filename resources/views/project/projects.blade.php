@extends('base')

@section('title')
  proyek
@stop

@section('content')

  <form method="get" action="{{URL::to('/logistik/proyek/page/1')}}">
    <div class="form-group">
      <div class="col-sm-10">
        <input type="text" class="form-control" onkeydown="if (event.keyCode == 13) { this.form.submit(); return false; }" id="key" name="key" placeholder="search" required>
      </div>
    </div>
  </form>

  <div class="space"></div>

  <table class="table table-hover">
  @foreach($projects as $project)
    <tr>
      <td>
        <a href="{{ URL::to('/logistik/proyek/'.$project->id)}}">{{$project->nama}}</a>
      </td>
      <td>{{$project->lokasi}}</td>
      <td>{{$project->tanggal_mulai}}</td>
     </tr>
  @endforeach
  </table>
  @if($page>1)
      <a href="{{URL::to($pageUrl.($page-1).$prefixUrl)}}">prev</a>&nbsp;
  @endif

  @for($i=1;$i<=$totalPages;$i++)
      @if($i == $page)
          {{$i}}&nbsp;
      @else
          <a href="{{URL::to($pageUrl.$i.$prefixUrl)}}">{{$i}}</a>&nbsp;
      @endif
  @endfor

  @if($page<$totalPages)
      <a href="{{URL::to($pageUrl.($page+1).$prefixUrl)}}">next</a>&nbsp;
  @endif
@stop
